<?php


session_start();

// if cookies is found redirect profile page

if (isset($_COOKIE['remember_user'])) {
    header("location:profile.php");
    exit();
}


if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $user_name = $_POST['user_name'];
    $remember_user = $_POST['remember_user'];

    $_SESSION['user_name'] = $user_name;

    if ($remember_user) {
        setcookie("remember_user", $remember_user, time() + 3600);
    }
    header("location:profile.php");
    exit();
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        form {
            width: 300px;
            background: #08428d;
            padding: 20px;
            color: #fff;

        }

        input {
            margin: 10px;
            border: none;
            border-radius: 5px;
            padding: 5px;
        }

        button {
            background: #1978e4;
            border-radius: 8px;
            border: none;
            padding: 10px;
            outline: none;
        }
    </style>
</head>

<body>
    <form method="post">
        <label for="user_name"> name : </label><br>
        <input type="text" name="user_name" id="user_name"><br>
        <input type="checkbox" name="remember_user" id="remember_user" value="true"> remember <br>
        <button type="submit">login</button>
    </form>

</body>

</html>