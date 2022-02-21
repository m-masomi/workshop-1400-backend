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
        <div class="bg-river-default flex h-8 items-center justify-center lg:h-10 lg:w-40 overflow-hidden rounded-sm w-24">
            <!----- start login button ----->
            <?php if (isset($_SESSION['auth-user'])): ?>
                <a href="<?php echo assets('login.php') ?>" class="bg-river-default flex h-full hover:opacity-100 items-center justify-center lg:text-14 opacity-90 tex text-12 text-white w-full">
                    <?php echo $_SESSION['auth-user']['name'].' '.$_SESSION['auth-user']['family']?>
                </a>
            <?php else: ?>
            <a href="<?php echo assets('login.php') ?>" class="bg-river-default flex h-full hover:opacity-100 items-center justify-center lg:text-14 opacity-90 tex text-12 text-white w-full">
                ورود یا ثبت‌نام
            </a>
            <?php endif; ?>
            <!----- end login button ----->
        </div>
    </div>
</header>
