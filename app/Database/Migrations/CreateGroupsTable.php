<?php


namespace App\Database\Migrations;


use App\Database\ConnectionHandler;

class CreateGroupsTable extends ConnectionHandler
{

    public function __construct()
    {
        parent::__construct();
    }


    public function run()
    {
        $sql = "
            CREATE TABLE IF NOT EXISTS `groups` (
              `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
              `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
              `status` int(11) NOT NULL DEFAULT '0',
              `created_at` timestamp NULL DEFAULT NULL,
              `updated_at` timestamp NULL DEFAULT NULL,
              PRIMARY KEY (`id`)
            ) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

        ";
        echo $this->connection->exec($sql);
    }

}