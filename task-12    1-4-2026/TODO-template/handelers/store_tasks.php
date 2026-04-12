<?php

if (requestMethod($_SERVER['REQUEST_METHOD'])) {
    foreach ($_POST as $field => $value) {
        $$field = fieldSanitization($value);
    }
    $error = validate_task($title, $priority);
    if (!empty($error)) {
        setMessage('danger', $error['msg'], $error['fieldName']);
        header("location:index.php?page=create_task");
        die();
    }


    $sql = "INSERT INTO tasks (title,priority) values('$title','$priority')";
    $result = mysqli_query($con, $sql);

    if (mysqli_affected_rows($con) == 1) {
        header("location:index.php?page=home");
        die();
    } else {
        file_put_contents('logs/application.php', date('Y:m:d H:m:s') . mysqli_error($con) . '\n', FILE_APPEND);
        header("location:index.php?page=create_task");
        die();
    }
}
