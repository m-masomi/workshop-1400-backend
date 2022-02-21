<?php


namespace App\Database;


class UserTable extends ConnectionHandler
{

    public function __construct()
    {
        parent::__construct();
    }

    public function checkCredentials($username, $password)
    {
        $statement  = $this->connection->prepare("SELECT * FROM `users` WHERE email = ? AND mobile = ? ;");
        $statement->execute([$username, $password]);
        $row = $statement->fetch();
        if ($row){
            $_SESSION['auth-user'] = $row;
        }

        return $row;

    }
}