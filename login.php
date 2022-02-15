<?php

use App\Database\ConnectionHandler;
use App\Database\UserTable;

require_once __DIR__.'/app/sessions_handler.php';
require_once __DIR__.'/vendor/autoload.php';

(new UserTable())->getUser()
?>


<!DOCTYPE html>
<html lang="fa" dir="rtl">
<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="/sites/workshop/assets/tailwind/tailwind-dist.css" />
    <title>صفحه ورود به پنل</title>
</head>

<body class="flex min-h-screen flex-col">
<!----- start header ----->
<header class="relative w-full bg-white py-4">
    <div class="relative mx-auto flex max-w-6xl flex-wrap items-center justify-between px-4" x-data="{ sidebarOpen: false }">
        <div class="hidden items-center lg:flex">
            <a href="#" class="flex flex-row items-center justify-center">
                <svg width="31" height="36" class="ml-3" viewBox="0 0 31 36" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <g clip-path="url(#clip0_15_148)">
                        <path d="M17.9087 36V25.7693C17.9087 18.6371 23.7699 12.855 31 12.855V23.0857C31 30.2181 25.1388 36 17.9087 36Z" fill="#485164"/>
                        <path d="M14.581 29.1934V14.3834C14.581 6.43957 8.05295 0 0 0V14.81C0 22.7536 6.528 29.1934 14.581 29.1934Z" fill="#485164"/>
                        <path d="M27.6762 7.28483C28.3089 4.66087 26.6654 2.0278 24.0054 1.4037C21.3454 0.7796 18.6762 2.40081 18.0435 5.02478C17.4108 7.64874 19.0543 10.2818 21.7143 10.9059C24.3743 11.53 27.0435 9.9088 27.6762 7.28483Z" fill="#485164"/>
                    </g>
                    <defs>
                        <clipPath id="clip0_15_148">
                            <rect width="31" height="36" fill="white"/>
                        </clipPath>
                    </defs>
                </svg>
                <span class="font-bold">ورک‌شاپ</span>
            </a>
            <div class="mr-8 block">
                <ul class="flex flex-wrap">
                    <li class="px-6 text-14 text-gray-300">
                        <a class="hover:text-river-default" href="#">صفحه اصلی</a>
                    </li>
                    <li class="px-6 text-14 text-gray-300">
                        <a class="hover:text-river-default" href="#">درباره ورک‌شاپ</a>
                    </li>
                    <li class="px-6 text-14 text-gray-300">
                        <a class="hover:text-river-default" href="#">فیلم‌های ورک‌شاپ</a>
                    </li>
                    <li class="px-6 text-14 text-gray-300">
                        <a class="hover:text-river-default" href="#">بلاگ</a>
                    </li>
                    <li class="px-6 text-14 text-gray-300">
                        <a class="hover:text-river-default" href="#">ارتباط با ما</a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="h-8 w-24 overflow-hidden rounded-sm bg-blue-400 lg:h-10 lg:w-40">
            <!----- start login button ----->
            <button class="h-full w-full bg-river-default text-12 text-white opacity-90 hover:opacity-100 lg:text-14">ورود یا ثبت‌نام</button>
            <!----- end login button ----->
        </div>
    </div>
</header>
<!----- end header ----->

<section class="flex flex-1 items-center justify-center border border-solid border-gray-150 bg-gray-100">
    <div class="card my-4 w-full max-w-md overflow-hidden rounded-sm border border-solid border-border-default bg-white p-12">
        <!----- start form ----->
        <form action="">
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
            <input class="mt-4 w-full overflow-hidden rounded-sm border border-solid border-transparent bg-gray-100 px-3 py-4 text-12 text-gray-250 outline-none focus:border-river-default focus:ring-0" type="text" placeholder="نام کاربری" />

            <input class="mt-4 w-full overflow-hidden rounded-sm border border-solid border-transparent bg-gray-100 px-3 py-4 text-12 text-gray-250 outline-none focus:border-river-default focus:ring-0" type="password" placeholder="رمزعبور" />
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
<footer class="w-full bg-white py-6">
    <div class="mx-auto flex max-w-6xl flex-wrap items-center justify-center px-4 lg:justify-between">
        <div>
            <span class="text-14 font-bold">گروه کامپیوتر کاردانش استان همدان - ۱۴۰۰</span>
        </div>

        <ul class="my-2 flex w-full flex-wrap items-center justify-center lg:my-0 lg:flex-1 lg:justify-start lg:pr-9">
            <li class="px-2 text-14 text-gray-500">
                <a class="hover:text-river-default" href="#">وزارت آموزش‌وپرورش</a>
            </li>
            <li class="hidden px-2 text-14 text-gray-500 lg:block">
                <a class="hover:text-river-default" href="#">دبیرخانه کامپیوتر</a>
            </li>
            <li class="hidden px-2 text-14 text-gray-500 lg:block">
                <a class="hover:text-river-default" href="#">کارگاه‌ها</a>
            </li>
            <li class="px-2 text-14 text-gray-500">
                <a class="hover:text-river-default" href="#">بلاگ</a>
            </li>
            <li class="hidden px-2 text-14 text-gray-500 lg:block">
                <a class="hover:text-river-default" href="#">ارتباط با ما</a>
            </li>
        </ul>

        <div class="flex items-center">

            <a href="#" class="hover:text-river-default">
                <svg width="32" height="32" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path
                        class="fill-current"
                        d="M25.9492 11.8778c-.0469-1.0629-.2188-1.7936-.465-2.4268-.254-.6721-.6448-1.2739-1.1567-1.774a4.9232 4.9232 0 0 0-1.7703-1.1529c-.6369-.2462-1.3638-.418-2.4267-.465-1.0707-.0508-1.4107-.0625-4.1266-.0625-2.7159 0-3.0559.0117-4.1227.0586-1.0629.0469-1.7936.2189-2.4266.465-.6723.254-1.274.6447-1.7743 1.1567a4.9252 4.9252 0 0 0-1.1528 1.7703c-.2462.637-.418 1.3637-.465 2.4266C6.0119 12.9446 6 13.2846 6 16.0005c0 2.7159.0118 3.0559.0586 4.1227.0469 1.0629.219 1.7936.4651 2.4269a4.9333 4.9333 0 0 0 1.1566 1.774 4.9224 4.9224 0 0 0 1.7703 1.1527c.637.2463 1.3637.4181 2.4268.465 1.0667.047 1.4068.0586 4.1227.0586s3.0559-.0116 4.1226-.0586c1.0629-.0469 1.7937-.2187 2.4267-.465a5.1166 5.1166 0 0 0 2.9271-2.9267c.246-.6371.418-1.364.4649-2.4269.0468-1.0668.0586-1.4068.0586-4.1227s-.004-3.0559-.0508-4.1227Zm-1.8014 8.1672c-.0431.977-.2072 1.5045-.3439 1.8563a3.3185 3.3185 0 0 1-1.8993 1.8992c-.3517.1367-.883.3009-1.8562.3438-1.0551.047-1.3715.0585-4.0405.0585-2.6691 0-2.9895-.0115-4.0408-.0585-.9769-.0429-1.5045-.2071-1.8562-.3438-.4336-.1603-.8284-.4143-1.1488-.7465a3.1102 3.1102 0 0 1-.7464-1.1487c-.1368-.3518-.3009-.8833-.3438-1.8563-.047-1.0551-.0586-1.3717-.0586-4.0407 0-2.6691.0116-2.9895.0586-4.0406.043-.9769.207-1.5045.3438-1.8562.1603-.4338.4143-.8284.7504-1.149a3.1052 3.1052 0 0 1 1.1488-.7463c.3517-.1367.8832-.3008 1.8562-.3439 1.0551-.0469 1.3717-.0586 4.0406-.0586 2.673 0 2.9894.0118 4.0407.0586.977.043 1.5045.2072 1.8562.344.4337.16.8284.414 1.1488.7462.3322.3244.5861.7152.7465 1.149.1367.3517.3008.8831.3439 1.8562.0468 1.0551.0586 1.3715.0586 4.0406 0 2.669-.0118 2.9816-.0586 4.0367Z"
                        fill="#000"
                    />
                    <path class="fill-current" d="M16.0039 10.8618c-2.8369 0-5.1387 2.3016-5.1387 5.1387 0 2.8372 2.3018 5.1387 5.1387 5.1387 2.8372 0 5.1387-2.3015 5.1387-5.1387 0-2.8371-2.3015-5.1387-5.1387-5.1387Zm0 8.4721c-1.8404 0-3.3333-1.4928-3.3333-3.3334 0-1.8406 1.4929-3.3333 3.3333-3.3333 1.8407 0 3.3334 1.4927 3.3334 3.3333s-1.4927 3.3334-3.3334 3.3334ZM22.545 10.6579c0 .6624-.537 1.1995-1.1995 1.1995-.6624 0-1.1995-.5371-1.1995-1.1995 0-.6625.5371-1.1994 1.1995-1.1994.6625 0 1.1995.537 1.1995 1.1994Z" fill="#000" />
                </svg>
            </a>
            <a href="#">
                <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" xml:space="preserve">
              <image
                  width="25"
                  height="25"
                  href="data:image/png;base64,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"
              />
            </svg>
            </a>
        </div>
    </div>
</footer>
<!----- end footer ----->
<script src="/sites/workshop/assets/scripts/alpine.js"></script>
</body>
</html>
