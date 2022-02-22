<?php


namespace App\Database\Seeder;


use App\Database\ConnectionHandler;
use PDOException;

class DataBaseSeeder extends ConnectionHandler
{

    public function __construct()
    {
        parent::__construct();
    }

    public function run()
    {
        try {
            //-----= group
            $groups =  $this->seed_group_table();
            //-----= admin user
            $this->seed_group_table();

            echo "Seeder Run Successfully 🤙";
        }catch (PDOException $e){
            die("Seeder Exception: ".$e->getMessage());
        }
    }

    private function seed_group_table()
    {
        try {
            $group_sql = "SELECT * FROM `groups` WHERE title LIKE 'admin'";
            $statement = $this->connection->prepare($group_sql);
            $statement->execute();

            if (count($statement->fetchAll(\PDO::FETCH_ASSOC)) <= 0){
                $group_sql = "INSERT INTO `groups`(`id`,`title`,`status`) VALUES (1, 'admin', 1)";
                $statement = $this->connection->prepare($group_sql);
                $statement->execute();
            }
            return $statement->fetchAll(\PDO::FETCH_ASSOC);

        }catch (PDOException $e){
            die("Seeder Exception: ".$e->getMessage());
        }
    }

    private function seed_admin_user_table($group)
    {
        try {
            $group_sql = "SELECT * FROM `users` WHERE email LIKE 'admin@email.com'";
            $statement = $this->connection->prepare($group_sql);
            $statement->execute();

            if (count($statement->fetchAll(\PDO::FETCH_ASSOC)) <= 0){
                $group_sql = "INSERT INTO `users`(`name`,`family`,`email`,`mobile`,`avatar`,`status`,`password`,`group_id`) 
                        VALUES (?,?,?,?,?,?,?,?)";
                $statement = $this->connection->prepare($group_sql);
                $statement->execute([
                    'مدیر',
                    'سایت',
                    'admin@email.com',
                    '09181113322',
                    null,
                    1,
                    md5('password'),
                    $group['id'] ?? 1
                ]);
            }

        }catch (PDOException $e){
            die("Seeder Exception: ".$e->getMessage());
        }
    }

}