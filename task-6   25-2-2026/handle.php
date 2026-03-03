<?php
// session_start();
require("validation.php");

if ($_SERVER['REQUEST_METHOD'] == "POST") {

    $name = trim($_POST['name']);
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);
    $phone = trim($_POST['phone']);

    $error = validateRegister($name, $email, $password, $phone);

    // check error
    if (empty($error)) {
        $_SESSION['user'] = [
            "name" => $name,
            "email" => $email,
            "password" => $password,
            "phone" => $phone
        ];

        header('location:profile.php');
    } else {
        $_SESSION['error'] = $error;

        header('location:register.php');
    }
}
