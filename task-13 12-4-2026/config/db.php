<?php


try {
    $con = mysqli_connect('localhost', 'root', '', 'blog');
} catch (Exception $e) {
    file_put_contents('log/application.php', date('y-m-d h:m:s') . $e->getMessage(), FILE_APPEND);
    include __DIR__ . '/../views/maintenance.php';
    exit();
}
