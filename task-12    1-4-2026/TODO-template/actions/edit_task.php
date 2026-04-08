<?php

require "../database/connection.php";

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    
    $task_id = $_POST['task_id'];
    $title = trim(htmlspecialchars(htmlentities($_POST['title'])));
    $priority = $_POST['priority'];

    $sql = "UPDATE  tasks  SET title='$title',priority='$priority' WHERE id='$task_id' ";
    $result = mysqli_query($con, $sql);

    if (mysqli_affected_rows($con) == 1) {
        header("location:../index.php?page=home");
    }
}
