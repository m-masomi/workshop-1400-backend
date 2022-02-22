<?php
require_once __DIR__ . '/../app/SessionHandler.php';
require_once __DIR__ . '/../app/helpers.php';
require_once __DIR__ . '/../vendor/autoload.php';

$user_id = $_GET['delete'] ?? 0;
if ($user_id > 0){
    $result = (new \App\Database\UserTable())->deleteUser($user_id);
    if ($result){
        $_SESSION['user-delete'] = true;
        header('Location: ' . assets('dashboard/users'));
    }else{
        $_SESSION['user-delete'] = false;
        header('Location: ' . assets('dashboard/users'));
    }
}
header('Location: ' . assets('dashboard/users'));