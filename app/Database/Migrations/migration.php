<?php

require_once __DIR__.'/../../../vendor/autoload.php';
use App\Database\Migrations\CreateGroupsTable;
use App\Database\Migrations\CreateMessagesTable;
use App\Database\Migrations\CreateUsersTable;


(new CreateGroupsTable())->run();
(new CreateUsersTable())->run();
(new CreateMessagesTable())->run();
