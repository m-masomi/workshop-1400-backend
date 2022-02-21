<aside class="card flex flex-col m-4 rounded-sm border border-solid border-border-default bg-white p-4 max-w-xl w-80">

    <!-- User profile Section -->
    <div class="flex flex-col justify-center items-center">
        <img class="rounded-full w-24 h-24 mt-16" src="<?php echo assets('/assets/images/avatar.jpg')?>" alt="">

        <div class="text-river-default font-semibold mt-8 text-16 w-full text-center"><?php echo $_SESSION['auth-user']['name'].' '.$_SESSION['auth-user']['family'] ?></div>
        <div class="text-river-default text-12 w-full text-center">ویرایش اطلاعات کاربری</div>
    </div>

    <!-- Menus -->
    <div class="flex flex-col justify-between">
        <ul class="px-4 w-full mt-16">
            <li class="flex flex-row my-2 w-full px-3 py-2 items-center border border-river-default hover:bg-river-default hover:text-white text-river-default">
                <a href="" class="text-lg flex flex items-center">
                    <i class="feather-grid text-2xl ml-3"></i>
                    داشبورد
                </a>
            </li>
            <li class="flex flex-row my-2 w-full px-3 py-2 items-center border border-river-default hover:bg-river-default hover:text-white text-river-default">
                <a href="" class="text-lg flex flex items-center">
                    <i class="feather-inbox text-2xl ml-3"></i>
                    صندوق ورودی
                </a>
            </li>
            <li class="flex flex-row my-2 w-full px-3 py-2 items-center border border-river-default hover:bg-river-default hover:text-white text-river-default">
                <a href="" class="text-lg flex flex items-center">
                    <i class="feather-users text-2xl ml-3"></i>
                    کاربران
                </a>
            </li>
            <li class="flex flex-row my-2 w-full px-3 py-2 items-center border border-river-default hover:bg-river-default hover:text-white text-river-default">
                <a href="" class="text-lg flex flex items-center">
                    <i class="feather-send text-2xl ml-3"></i>
                    ارسال پیامک
                </a>
            </li>
            <li class="flex flex-row my-2 w-full px-3 py-2 items-center border border-river-default hover:bg-river-default hover:text-white text-river-default">
                <a href="" class="text-lg flex flex items-center">
                    <i class="feather-monitor text-2xl ml-3"></i>
                    کلاس‌ها
                </a>
            </li>
        </ul>

        <ul x-data:{} class="px-4 w-full mt-16">
            <li @click="()=>{console.log('hello')}" class="flex flex-row my-2 w-full px-3 py-2 items-center border border-river-default hover:bg-vivid-700 hover:text-white text-river-default">
                <a href="" class="text-lg flex flex items-center">
                    <i class="feather-power text-2xl ml-3"></i>
                    خروج
                </a>
            </li>
        </ul>
    </div>

<script>
    function logout(){
        alert('hello')
    }
</script>
</aside>