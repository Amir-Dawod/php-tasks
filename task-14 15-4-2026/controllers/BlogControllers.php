<?php

if (requestMethod('POST')) {

    $title = fieldSanitation($_POST['title']);
    $image = $_FILES['image'];
    $content = fieldSanitation($_POST['content']);

    $error = validateBlog($title, $image, $content);

    if (!empty($error)) {
        setMessage('danger', $error);
        header('location:index.php?page=create-blog');
        exit();
    }

    if (createBlog($title, $image, $content, $con)) {
        setMessage('success', 'added blog successfully');
        header('location:index.php?page=blogs');
        exit();
    }
}
