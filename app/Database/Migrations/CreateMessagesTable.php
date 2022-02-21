<?php


namespace App\Database\Migrations;


use App\Database\ConnectionHandler;

class CreateMessagesTable extends ConnectionHandler
{

    public function __construct()
    {
        parent::__construct();
    }


    public function run()
    {
        $sql = "
            CREATE TABLE IF NOT EXISTS `messages` (
              `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
              `message` text COLLATE utf8mb4_unicode_ci NOT NULL,
              `type` int(11) NOT NULL DEFAULT '0',
              `mobile` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
              `log_id` bigint(20) UNSIGNED DEFAULT NULL,
              `provider` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
              `number` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
              `cost` int(11) DEFAULT NULL,
              `status` tinyint(4) NOT NULL DEFAULT '0',
              `date` timestamp NOT NULL,
              `created_at` timestamp NULL DEFAULT NULL,
              `updated_at` timestamp NULL DEFAULT NULL,
              PRIMARY KEY (`id`),
              KEY `messages_log_id_foreign` (`log_id`)
            ) ENGINE=InnoDB AUTO_INCREMENT=259 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
        ";
        echo $this->connection->exec($sql);
    }

}