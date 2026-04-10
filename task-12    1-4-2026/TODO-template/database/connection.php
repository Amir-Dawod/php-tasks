<?php





try {

    $con = mysqli_connect("localhost", "root", "", "todolist");
} catch (Exception  $e) {
    file_put_contents('logs/application.php', date('Y:m:d H:m:s') . $e->getMessage() . '\n', FILE_APPEND);
    echo "error :" . $e->getMessage();
}
