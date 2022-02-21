<?php
require_once __DIR__.'/app/SessionHandler.php';
require_once __DIR__.'/app/helpers.php';
require_once __DIR__.'/vendor/autoload.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST'){
    $username = $_POST['username'] ?? '';
    $password = $_POST['password'] ?? '';

    $result = (new \App\Database\UserTable())->checkCredentials($username, $password);
    if ($result){
        header('Location: '.assets('dashboard/index'));
    }
}

if (isset($_SESSION['auth-user'])){
    header('Location: '.assets('dashboard/index'));
}
?>
<!DOCTYPE html>
<html lang="fa" dir="rtl">
<head>
    <?php include_once 'partials/meta.php' ?>
    <title>صفحه ورود به پنل</title>
</head>

<body class="flex min-h-screen flex-col">
<!----- start header ----->
<?php include_once 'partials/header.php' ?>
<!----- end header ----->

<section class="flex flex-1 items-center justify-center border border-solid border-gray-150 bg-gray-100">
    <div class="card my-4 w-full max-w-md overflow-hidden rounded-sm border border-solid border-border-default bg-white p-12">
        <!----- start form ----->

        <form method="post" action="" autocomplete="off">
            <input type="hidden" name="hidden">
            <div class="my-7 flex justify-center">
                <a href="#">
                    <svg width="77" height="89" viewBox="0 0 77 89" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <g clip-path="url(#clip0_18_154)">
                            <path d="M44.4829 88.9999V63.7074C44.4829 46.0752 59.0415 31.7804 77.0001 31.7804V57.0729C77.0001 74.7059 62.4415 88.9999 44.4829 88.9999Z" fill="#485164"/>
                            <path d="M36.2172 72.1727V35.5591C36.2172 15.9201 20.0025 0 0 0V36.6136C0 56.2519 16.2147 72.1727 36.2172 72.1727Z" fill="#485164"/>
                            <path d="M68.7441 18.0097C70.3155 11.5227 66.2333 5.01311 59.6263 3.4702C53.0192 1.92729 46.3891 5.93529 44.8177 12.4223C43.2462 18.9093 47.3284 25.4189 53.9355 26.9618C60.5426 28.5047 67.1726 24.4967 68.7441 18.0097Z" fill="#485164"/>
                        </g>
                        <defs>
                            <clipPath id="clip0_18_154">
                                <rect width="77" height="89" fill="white"/>
                            </clipPath>
                        </defs>
                    </svg>
                </a>
            </div>
            <h2 class="text-center text-20 font-bold">ورود به پنل</h2>
            <span class="block py-2 text-center text-14 text-gray-350"> برای استفاده از خدمات باید وارد شوید </span>
            <!----- start email or number input ----->
            <input name="username" class="mt-4 w-full overflow-hidden rounded-sm border border-solid border-transparent bg-gray-100 px-3 py-4 text-12 text-gray-250 outline-none focus:border-river-default focus:ring-0" type="text" placeholder="نام کاربری" />

            <input name="password" class="mt-4 w-full overflow-hidden rounded-sm border border-solid border-transparent bg-gray-100 px-3 py-4 text-12 text-gray-250 outline-none focus:border-river-default focus:ring-0" type="password" placeholder="رمزعبور" />
            <!----- end email or number input ----->
            <!----- start next step button ----->
            <button class="mt-4 w-full overflow-hidden rounded-sm bg-river-default py-2 text-white opacity-90 hover:opacity-100">ورود</button>
            <!----- end next step button ----->
        </form>
        <!----- end form ----->
        <div class="mt-8 border-t border-solid py-8">
            <h2 class="text-center text-20 font-bold">ثبت نام در پنل</h2>
            <span class="mb-4 block py-2 text-center text-14"> برای ثبت نام کلیک کنید </span>
            <!----- start sign up button ----->
            <button class="my-2 w-full overflow-hidden rounded-sm border border-solid border-river-default py-2 text-river-default opacity-90 hover:bg-river-default hover:text-white">ثبت نام در پنل</button>
            <!----- end sign up button ----->
        </div>
    </div>
</section>

<!----- start footer ----->
<?php include_once 'partials/footer.php' ?>
<!----- end footer ----->
<script src="<?php echo assets('assets/scripts/alpine.js')?>"></script>
</body>
</html>

