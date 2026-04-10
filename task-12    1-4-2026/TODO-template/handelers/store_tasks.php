<?php
require "../database/connection.php";

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $title = trim(htmlspecialchars(htmlentities($_POST['title'])));
    $priority = $_POST['priority'];

    $sql = "INSERT INTO tasks (title,priority) values('$title','$priority')";
    $result = mysqli_query($con, $sql);

    if(mysqli_affected_rows($con) == 1){
        header("location:../index.php?page=home");
    }
}
