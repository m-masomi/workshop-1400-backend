<?php
require_once __DIR__.'/../../../vendor/autoload.php';

use App\Database\Migrations\CreateMessagesTable;
use App\Database\ConnectionHandler;
use App\Database\Migrations\CreateUsersTable;
use App\Database\Migrations\CreateGroupsTable;

(new CreateGroupsTable())->run();
(new CreateUsersTable())->run();
(new CreateMessagesTable())->run();