<?php

if (requestMethod('POST')) {
    $task_id = $_POST['task_id'];
    $sql = "DELETE  FROM tasks  WHERE id='$task_id' ";
    echo $task_id;
    $result = mysqli_query($con, $sql);

    if (mysqli_affected_rows($con) == 1) {
        header("location:index.php?page=home");
        die();
    } else {
        file_put_contents('logs/application.php', date('Y:m:d H:m:s') . " Deleted failed: Task ID ($task_id) not found " . "\n", FILE_APPEND);
        header("location:index.php?page=home");
        die();
    }
}
