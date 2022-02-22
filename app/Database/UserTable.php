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
        $statement  = $this->connection->prepare("SELECT * FROM `users` WHERE email = ? AND password = ? ;");
        $statement->execute([$username, md5($password)]);
        $row = $statement->fetch();
        if ($row){
            $_SESSION['auth-user'] = $row;
        }

        return $row;

    }

    public function getUsers($name = null, $group = null, $mobile = null)
    {

        $sql = ["SELECT `users`.`id`,`name`, `family`, `email`, `mobile`, `avatar`, `users`.`status`, `password`, `group_id`, `title` FROM `users`"];
        $params = [];


        if (!empty(rtrim($name))){
            $sql[] = "WHERE";
            $sql[] = "name LIKE ?";
            $params[] = "%".rtrim($name)."%";
        }

        if (!empty(rtrim($mobile))){
            $sql[] = count($sql) <= 1 ? "WHERE" : "AND";
            $sql[] = "mobile LIKE ?";
            $params[] = "%".rtrim($mobile)."%";
        }

        if (!empty(rtrim($group))){
            $sql[] = count($sql) <= 1 ? "WHERE" : "AND";
            $sql[] = "group_id = ?";
            $params[] = rtrim($group);
        }
        $sql[] = "LEFT JOIN `groups` ON users.group_id = groups.id";

        $statement = $this->connection->prepare(implode(" ", $sql));
        $statement->execute($params);
        return $statement->fetchAll();

    }

    public function createUser($data)
    {
        $group_sql = "INSERT INTO `users`(`name`,`family`,`email`,`mobile`,`avatar`,`status`,`password`,`group_id`) 
                        VALUES (?,?,?,?,?,?,?,?)";
        $statement = $this->connection->prepare($group_sql);
        return $statement->execute([
            $data['name'],
            $data['family'],
            $data['email'],
            $data['mobile'],
            null,
            1,
            md5($data['password']),
            $data['group']
        ]);
    }

    public function deleteUser($user_id)
    {
        $sql = "DELETE FROM `users` where id = ?";
        $statement = $this->connection->prepare($sql);
        return $statement->execute([$user_id]);
    }
}