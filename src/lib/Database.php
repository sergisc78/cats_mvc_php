<?php

namespace Sergi\CatsMvc\lib;
use Sergi\CatsMvc\config\Constants;

use PDO;
use PDOException;


class Database
{

    private $host;
    private $db_name;
    private $user;
    private $password;
    

    public function __construct(){

         $this->host = Constants::$host;
         $this->user =   Constants::$username;
         $this->password = Constants::$password;
         $this->db_name = Constants::$dbname;

    }


    public function connect()
    {

        try {
            $connection = new PDO('mysql:host=' . $this->host . ';dbname=' . $this->db_name, $this->user, $this->password);
            $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $connection->exec("SET CHARACTER SET UTF8");
        } catch (PDOException $e) {
            die("Error" . $e->getMessage());
            echo ("There is an error on line" . $e->getLine());
        }
        return $connection;
    }
}
