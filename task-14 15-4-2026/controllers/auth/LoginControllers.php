<?php

if (requestMethod('POST')) {

    foreach ($_POST as $field => $value) {
        $$field = fieldSanitation($value);
    }
    $error = validateLogin($email, $password);
    if (!empty($error)) {
        setMessage('danger', $error);
        header('location:index.php?page=login');
        exit();
    }

    if (blogLogin($email, $password, $con)) {
        setMessage('success', 'added user successfully');
        header('location:index.php?page=home');
        exit();
    } else {
        setMessage('danger', 'incorrect email or password');
        header('location:index.php?page=login');
        exit();
    }
}
