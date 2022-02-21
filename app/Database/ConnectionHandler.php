<?php


namespace App\Database;


use PDO;
use PDOException;

class ConnectionHandler
{
    protected $connection = null;
    public function __construct()
    {
        $servername = 'localhost';
        $dbname = 'dbd_workshop';
        $username = 'root';
        $password = '';
        try {
            $this->connection =  new PDO("mysql:host=$servername;dbname=$dbname; charset=utf8", $username, $password);
            // set the PDO error mode to exception
            $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
//            echo "Connected successfully";
        } catch(PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        }
    }


}