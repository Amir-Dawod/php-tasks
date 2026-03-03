<?php

if($_SERVER['REQUEST_METHOD']=='POST'){

setcookie("color",$_POST['color'], time() + 60);

header('refresh:.5');
exit;

}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=
    , initial-scale=1.0">
    <title>Document</title>
    <style>
        input{
            width: 30px;
            height: 30px;
            color: transparent;
            border-radius: 50%;
            border: 2px solid #fff;
            cursor: pointer;
        }
        #b1{
            background-color: red;
        }
        #b2{
            background-color: green;
        }
        #b3{
            background-color: blue;
        }
    </style>
</head>
<body style="background-color: <?php  echo $_COOKIE['color'] ?? "red" ?>">
    <form action="" method="post">
        <input type="submit" name="color"id="b1"value="red">
        <input type="submit" name="color"id="b2"value="green">
        <input type="submit" name="color"id="b3"value="blue">
    </form>
</body>
</html>