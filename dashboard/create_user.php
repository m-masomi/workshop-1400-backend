<?php


require_once __DIR__ . '/../app/SessionHandler.php';
require_once __DIR__ . '/../app/helpers.php';
require_once __DIR__ . '/../vendor/autoload.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST'){
    $validator = new \App\Validation\Validator();


    $data = [];
    $data['name'] = $_POST['name'] ?? '';
    $data['family'] = $_POST['family'] ?? '';
    $data['mobile'] = $_POST['mobile'] ?? '';
    $data['group'] = $_POST['group'] ?? '';
    $data['email'] = $_POST['email'] ?? '';
    $data['password'] = str_random(8);

    $validator->name('name')->value($data['name'])->alias('نام')->pattern('string')->required();
    $validator->name('family')->value($data['family'])->alias('نام خانوادگی')->pattern('string')->required();
    $validator->name('mobile')->value($data['mobile'])->alias('موبایل')->pattern('tel')->required();
    $validator->name('email')->value($data['email'])->alias('ایمیل')->pattern('email')->required();
    $validator->name('group')->value($data['group'])->alias('کلاس')->pattern('numeric')->required();
    $validator->name('password')->value($data['password'])->alias('رمزعبور')->min(6)->required();


    if ($validator->isSuccess()){
        $result = (new \App\Database\UserTable())->createUser($data);
        if ($result){
            $_SESSION['user-store'] = true;
            header('Location: '.assets('dashboard/users'));
        }else{
            $_SESSION['user-store'] = false;
            header('Location: '.assets('dashboard/users'));
        }
    }else{
        $_SESSION['errors'] = $validator->getErrors();
        header('Location: '.assets('dashboard/users'));
    }



}
header('Location: '.assets('dashboard/users'));