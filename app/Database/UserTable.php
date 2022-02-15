<?php


namespace App\Database;


class UserTable extends ConnectionHandler
{

    public function __construct()
    {
        parent::__construct();
    }

    public function getUser()
    {
        $stat =  $this->connection->prepare('SELECT * from `users` ');
        $stat->execute();
        $rows = $stat->fetch();
        var_dump($rows);

    }
}