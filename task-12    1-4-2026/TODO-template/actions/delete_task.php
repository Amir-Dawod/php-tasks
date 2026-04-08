<?php

require "../database/connection.php";

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $task_id = $_POST['task_id'];
    $sql = "DELETE  FROM   tasks   WHERE id='$task_id' ";
    $result = mysqli_query($con, $sql);

    if (mysqli_affected_rows($con) == 1) {
        header("location:../index.php?page=home");
    }
}
