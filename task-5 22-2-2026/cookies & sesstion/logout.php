<?php


session_start();

session_unset(); // delete all the data without delete session_id 
session_destroy(); // delete all the data with delete session_id 
setcookie("remember_user", '', time() - 3600); // delete cookies 
header('location: login.php');
exit();
