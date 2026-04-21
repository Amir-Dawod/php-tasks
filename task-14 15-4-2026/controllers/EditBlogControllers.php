<?php

if (requestMethod('POST')) {

    $post_id = $_POST['id'];
    $title = fieldSanitation($_POST['title']);
    $image = $_FILES['image'];
    $content = fieldSanitation($_POST['content']);
    $error = validateBlog($title, $image, $content);

    if (!empty($error)) {
        setMessage('danger', $error);
        header("location:index.php?id=$post_id&page=edit-blog");
        exit();
    }

    if (editBlog($post_id, $title, $image, $content, $con)) {
        setMessage('success', 'added post successfully');
        header('location:index.php?page=blogs');
        exit();
    } 
}
