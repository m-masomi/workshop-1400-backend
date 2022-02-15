<?php
namespace App\Database;

use PDO;
use PDOException;



class ConnectionHandler
{

    protected $connection = null;

    public function __construct()
    {
        $host_name = 'localhost';
        $db_name = 'dbd_workshop';
        $username = 'root';
        $password = '';

        try {
            $this->connection =  new PDO("mysql:host=$host_name;dbname=$db_name; charset=utf8", $username, $password);

            $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        }catch (PDOException $exception){
            echo "Connection Failed: ". $exception->getMessage();
        }
    }
}