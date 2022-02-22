<?php


namespace App\Database;


class GroupTable extends ConnectionHandler
{

    public function __construct()
    {
        parent::__construct();
    }

    public function getGroups($title = null)
    {
        $sql = ["SELECT * FROM `groups`"];
        $params = [];

        if (!empty(rtrim($title))){
            $sql[] = "WHERE";
            $sql[] = "title LIKE ?";
            $params[] = "%" . rtrim($title) ."%";
        }

        $statement = $this->connection->prepare(implode(" ", $sql));
        $statement->execute();
        return $statement->fetchAll();
    }
}