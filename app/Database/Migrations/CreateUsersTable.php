<?php


namespace App\Database\Migrations;


use App\Database\ConnectionHandler;

class CreateUsersTable extends ConnectionHandler
{
    public function __construct()
    {
        parent::__construct();
    }

    public function run()
    {
        $sql = "
            CREATE TABLE IF NOT EXISTS `users` (
              `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
              `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
              `family` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
              `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
              `mobile` varchar(14) COLLATE utf8mb4_unicode_ci NOT NULL,
              `avatar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
              `status` int(11) NOT NULL DEFAULT '0',
              `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
              `group_id` bigint(20) UNSIGNED DEFAULT NULL,
              `created_at` timestamp NULL DEFAULT NULL,
              `updated_at` timestamp NULL DEFAULT NULL,
              PRIMARY KEY (`id`),
              UNIQUE KEY `users_email_unique` (`email`),
              KEY `users_mobile_index` (`mobile`),
              KEY `users_group_id_foreign` (`group_id`)
            ) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
        ";
        echo $this->connection->exec($sql);

        $alter_sql = "
        ALTER TABLE `users`
            ADD CONSTRAINT `users_group_id_foreign` FOREIGN KEY (`group_id`) REFERENCES `groups` (`id`);";

        echo $this->connection->exec($alter_sql);
    }
}