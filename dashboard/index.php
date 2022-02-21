<?php
require_once __DIR__.'/../app/SessionHandler.php';
require_once __DIR__.'/../app/helpers.php';
require_once __DIR__.'/../vendor/autoload.php';
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

</section>

<!----- start footer ----->
<?php include_once '../partials/footer.php' ?>
<!----- end footer ----->
<script src="<?php echo assets('assets/scripts/alpine.js')?>"></script>
<script defer src="https://unpkg.com/axios/dist/axios.min.js"></script>
</body>
</html>
