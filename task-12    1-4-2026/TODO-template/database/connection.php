<?php


try {

    $con = mysqli_connect("localhost", "root", "", "todolist");
} catch (Exception  $e) {

    date_default_timezone_set("Asia/Riyadh");
    file_put_contents("log/application.php", date("Y-m-d H-i-s ") . $e->getMessage() . " \n", FILE_APPEND);
    include "views/maintenance.php";
    exit();
}
