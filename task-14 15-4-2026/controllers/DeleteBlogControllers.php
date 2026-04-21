<?php


$post_id = $_GET['id'];
if (deleteBlog($post_id, $con)) {
    setMessage("success", "deleted product successfully");
    header('location:index.php?page=blogs');
    exit();
} else {
    file_put_contents('log/application.php', date('Y:m:d H:m:s') . " Deleted failed: Post ID ($post_id) not found " . "\n", FILE_APPEND);
    header('location:index.php?page=blogs');
    exit();
}
