<?php


class DataBase
{
    private mysqli $con;
    public function connect(): mysqli
    {
     $this->con = mysqli_connect("localhost", "root", "", "oop_Products");
        if (!$this->con) {
            throw new Exception("DB connection failed");
        }
        return $this->con;
    }
}
