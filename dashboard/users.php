<?php
require_once __DIR__ . '/../app/SessionHandler.php';
require_once __DIR__ . '/../app/helpers.php';
require_once __DIR__ . '/../vendor/autoload.php';

$groups = (new \App\Database\GroupTable())->getGroups();
$name = $_GET['name'] ?? null;
$mobile = $_GET['mobile'] ?? null;
$group = $_GET['group'] ?? null;

$users = (new \App\Database\UserTable())->getUsers($name, $group, $mobile);

?>

<!DOCTYPE html>
<html lang="fa" dir="rtl">
<head>
    <?php include_once '../partials/meta.php' ?>
    <title>صفحه ثبت نام در پنل</title>
</head>

<body class="flex min-h-screen flex-col">
<!----- start header ----->
<?php include_once '../partials/header.php' ?>
<!----- end header ----->

<section class="flex flex-row border border-solid border-gray-150 bg-gray-100">

    <?php include_once '../partials/sidebar.php' ?>

    <main class="card flex flex-row rounded-sm border border-solid border-river-default bg-white p-6 m-4 w-full">

        <div class="grid grid-cols-4 gap-4 w-full">
            <!-- users table  -->
            <div class="col-span-3 flex flex-col border border-solid border-river-default ">

                <div class="grid grid-cols-3 gap-3 p-4">

                    <input
                            class="mt-4 w-full overflow-hidden rounded-sm border border-solid border-transparent bg-gray-100 px-3 py-4 text-12 text-gray-250 outline-none focus:border-river-default focus:ring-0"
                            type="text" placeholder="نام کاربری"/>

                    <select name="" id=""
                            class="mt-4 w-full overflow-hidden rounded-sm border border-solid border-transparent bg-gray-100 px-3 py-4 text-12 text-gray-250 outline-none focus:border-river-default focus:ring-0">
                        <option value="">یک مورد را انتخاب کنید</option>
                        <?php foreach ($groups as $group): ?>
                            <option value="<?php echo $group['id'] ?>"><?php echo $group['title'] ?></option>
                        <?php endforeach; ?>
                    </select>

                    <input
                            class="mt-4 w-full overflow-hidden rounded-sm border border-solid border-transparent bg-gray-100 px-3 py-4 text-12 text-gray-250 outline-none focus:border-river-default focus:ring-0"
                            type="text" placeholder="نام کاربری"/>

                </div>

                <div class="flex flex-col mt-16 p-4">

                    <!-- header -->
                    <div class="grid grid-cols-6 text-gray-500 bg-gray-100 text-sm">
                        <div class="col-span-3 px-3 py-2"> نام و نام خانوادگی</div>
                        <div class=" px-3 py-2">کلاس</div>
                        <div class=" px-3 py-2">شماره موبایل</div>
                        <div class=" px-3 py-2 text-left">عملیات</div>
                    </div>

                    <!-- rows -->
                    <?php foreach ($users as $user): ?>
                        <div class="grid grid-cols-6 text-gray-500 bg-gray-100 text-sm mt-4">
                            <div class="col-span-3 px-3 py-2"><?php echo $user['name'] . " " . $user['family'] ?></div>
                            <div class=" px-3 py-2"><?php echo $user['title'] ?? "-" ?></div>
                            <div class=" px-3 py-2"><?php echo $user['mobile'] ?></div>
                            <div class=" px-3 flex flex-row justify-end">
                                <span class="mr-2 px-3 py-2 hover:text-white hover:bg-river-default cursor-pointer">
                                    <i class="feather-eye"></i>
                                </span>
                                <span class="mr-2 px-3 py-2 hover:text-white hover:bg-river-default cursor-pointer">
                                    <i class="feather-edit"></i>
                                </span>
                                <a href="delete_user.php?delete=<?php echo $user['id']?>" class="mr-2 px-3 py-2 hover:text-white hover:bg-river-default cursor-pointer">
                                    <i class="feather-trash-2"></i>
                                </a>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>

            <!-- user edit -->
            <div class="flex flex-col border border-solid border-river-default p-4">

                <div class="border border-river-default px-4 flex justify-center items-center py-2">
                    افزدن کاربر جدید
                </div>

                <?php if (isset($_SESSION['user-store'])): ?>
                <?php if ($_SESSION['user-store']): ?>
                    <div class="border mt-4 bg-green-600 text-white px-4 flex justify-center items-center py-2">
                        کاربر با موفقیت افزوده شد.
                    </div>
                <?php else: ?>
                    <div class="border mt-4 bg-red-600 text-white px-4 flex justify-center items-center py-2">
                        خطا در افزودن کاربر.
                    </div>
                <?php endif; ?>
                <?php unset($_SESSION['user-store']); endif; ?>


                <?php if (isset($_SESSION['user-delete'])): ?>
                    <?php if ($_SESSION['user-delete']): ?>
                        <div class="border mt-4 bg-green-600 text-white px-4 flex justify-center items-center py-2">
                            کاربر با موفقیت حذف شد.
                        </div>
                    <?php else: ?>
                        <div class="border mt-4 bg-red-600 text-white px-4 flex justify-center items-center py-2">
                            خطا در حذف کاربر.
                        </div>
                    <?php endif; ?>
                    <?php unset($_SESSION['user-delete']); endif; ?>


                <form method="post" action="create_user.php" class="mt-16 flex flex-col">
                    <input
                            class="mt-4 w-full overflow-hidden rounded-sm border border-solid border-transparent bg-gray-100 px-3 py-4 text-12 text-gray-250 outline-none focus:border-river-default focus:ring-0"
                            type="text"
                            name="name"
                            placeholder="نام"/>
                    <?php if (isset($_SESSION['errors']) && isset($_SESSION['errors']['name'])): ?>
                        <span class="text-12 text-red-500"><?php echo $_SESSION['errors']['name'] ?></span>
                    <?php endif; ?>
                    <input
                            class="mt-4 w-full overflow-hidden rounded-sm border border-solid border-transparent bg-gray-100 px-3 py-4 text-12 text-gray-250 outline-none focus:border-river-default focus:ring-0"
                            type="text"
                            name="family"
                            placeholder="نام خانوادگی"/>
                    <?php if (isset($_SESSION['errors']) && isset($_SESSION['errors']['family'])): ?>
                        <span class="text-12 text-red-500"><?php echo $_SESSION['errors']['family'] ?></span>
                    <?php endif; ?>
                    <input
                            class="mt-4 w-full overflow-hidden rounded-sm border border-solid border-transparent bg-gray-100 px-3 py-4 text-12 text-gray-250 outline-none focus:border-river-default focus:ring-0"
                            type="text"
                            name="mobile"
                            placeholder="شماره موبایل"/>
                    <?php if (isset($_SESSION['errors']) && isset($_SESSION['errors']['mobile'])): ?>
                        <span class="text-12 text-red-500"><?php echo $_SESSION['errors']['mobile'] ?></span>
                    <?php endif; ?>
                    <input
                            class="mt-4 w-full overflow-hidden rounded-sm border border-solid border-transparent bg-gray-100 px-3 py-4 text-12 text-gray-250 outline-none focus:border-river-default focus:ring-0"
                            type="text"
                            name="email"
                            placeholder="ایمیل"/>
                    <?php if (isset($_SESSION['errors']) && isset($_SESSION['errors']['email'])): ?>
                        <span class="text-12 text-red-500"><?php echo $_SESSION['errors']['email'] ?></span>
                    <?php endif; ?>

                    <select name="group"
                            class="mt-4 w-full overflow-hidden rounded-sm border border-solid border-transparent bg-gray-100 px-3 py-4 text-12 text-gray-250 outline-none focus:border-river-default focus:ring-0">
                        <?php foreach ($groups as $group): ?>
                            <option value="<?php echo $group['id'] ?>"><?php echo $group['title'] ?></option>
                        <?php endforeach; ?>
                    </select>
                    <?php if (isset($_SESSION['errors']) && isset($_SESSION['errors']['group'])): ?>
                        <span class="text-12 text-red-500"><?php echo $_SESSION['errors']['group'] ?></span>
                    <?php endif; ?>
                    <?php if (isset($_SESSION['errors'])) {unset($_SESSION['errors']);} ?>

                    <button type="submit"
                            class="mt-4 w-full overflow-hidden rounded-sm bg-river-default py-2 text-white opacity-90 hover:opacity-100">
                        افزودن کاربر
                    </button>


                </form>
            </div>
        </div>
    </main>


</section>

<!----- start footer ----->
<?php include_once '../partials/footer.php' ?>
<!----- end footer ----->
<script src="<?php echo assets('assets/scripts/alpine.js') ?>"></script>
<script defer src="https://unpkg.com/axios/dist/axios.min.js"></script>
</body>
</html>
