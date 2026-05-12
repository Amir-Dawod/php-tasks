<?php


namespace App;

use Dom\Mysql;
use mysqli;
use PDO, PDOException;

class DataBase
{

    private PDO  $conn;
    public function __construct()
    {

        try {

            $this->conn = new PDO(
                "mysql:host=" . DB_HOST . ";dbname=" . DB_NAME,
                DB_USER,
                DB_PASS
            );
        } catch (PDOException $e) {

            die($e->getMessage());
        }
    }
    public  function getConnection()
    {
        return $this->conn;
    }
}
