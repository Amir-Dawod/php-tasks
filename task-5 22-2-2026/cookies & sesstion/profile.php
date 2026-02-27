<?php

session_start();

// if $_SESSION['user_name'] is not  found redirect login page

if (!$_SESSION['user_name']) {
   header('location: login.php');
   exit();
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Document</title>
</head>

<body>
   <h2> welcome <?= $_SESSION['user_name'] ?> </h2>
   <a href="logout.php">logout</a>
</body>

</html>