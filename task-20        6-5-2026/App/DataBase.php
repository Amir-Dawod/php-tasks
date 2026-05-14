<?php


namespace App;
use PDO, PDOException; //  Import PDO classes from the global namespace

class DataBase
{

    private PDO  $conn;
    public function __construct()
    {

        try {

            $this->conn = new PDO( "mysql:host=" . DB_HOST . ";dbname=" . DB_NAME, DB_USER,DB_PASS,charset=utf8mb4);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); // Enable exception mode for PDO errors

        } catch (PDOException $e) {

            die($e->getMessage());
        }
    }
    public  function getConnection()
    {
        return $this->conn;
    }
}
