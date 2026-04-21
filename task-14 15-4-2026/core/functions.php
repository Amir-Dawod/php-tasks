<?php

use Dom\Mysql;

function requestMethod($method)
{
    if ($_SERVER['REQUEST_METHOD'] == $method) {
        return true;
    }
    return false;
}

function fieldSanitation($value)
{
    return trim(htmlspecialchars(htmlentities($value)));
}

function setMessage($type, $msg)
{
    $_SESSION['message'] = [
        'type' => $type,
        'msg' => $msg
    ];
}
function  showMessage()
{
    if (isset($_SESSION['message'])) {
        $type = $_SESSION['message']['type'];
        $msg = $_SESSION['message']['msg'];
        echo "<div class='alert alert-$type' >$msg</div>";
    }
    unset($_SESSION['message']);
}

function blogRegister($name, $email, $phone, $password, $con)
{

    $password_hash = password_hash($password, PASSWORD_DEFAULT);
    $sql = "INSERT INTO users (name,email,phone,password) VALUES ('$name','$email','$phone','$password_hash')";
    mysqli_query($con, $sql);
    if (mysqli_affected_rows($con) == 1) {
        return true;
    }

    return false;
}
function blogLogin($email, $password, $con)
{
    $sql = "SELECT * FROM  users where email ='$email'";
    $res =   mysqli_query($con, $sql);
    $user = mysqli_fetch_assoc($res);

    if (mysqli_affected_rows($con)) {

        if (password_verify($password, $user['password'])) {
            $_SESSION['user'] = [
                'id' => $user['id'],
                'name' => $user['name'],
                'email' => $user['email'],
            ];
            return true;
        }
    }
    return false;
}

function createBlog($title, $image, $content, $con)
{
    $imagePath = "assets/img/" . $image['name'];
    $user_id = $_SESSION['user']['id'];
    $sql = "INSERT INTO posts (title,`image`,content,user_id) VALUES ('$title','$imagePath','$content','$user_id')";
    mysqli_query($con, $sql);
    if (mysqli_affected_rows($con) == 1) {
        if (move_uploaded_file($image['tmp_name'], $imagePath)) {
            return true;
        }
    }
    return false;
}
function editBlog($id, $title, $image, $content, $con)
{
    $post = getBlog($id, $con);
    $pathImage = empty($image['name']) ? $post['image'] : "assets/img/" . $image['name'];

    if ($pathImage != $post['image']) {
        move_uploaded_file($image['tmp_name'], $pathImage);
        unlink($post['image']);
    }
    $sql = "UPDATE posts  SET title ='$title',image='$pathImage',content='$content' where id = '$id'";
    mysqli_query($con, $sql);

    if (mysqli_affected_rows($con) == 1) {
            return true;
    }
    return false;
}

function deleteBlog($id, $con)
{
    $post = getBlog($id, $con);
    $sql = "DELETE FROM  posts where id ='$id' ";
    $res =   mysqli_query($con, $sql);
    if (mysqli_affected_rows($con) == 1) {
        if (file_exists($post['image'])) {
            unlink($post['image']);
        }
        return true;
    }
    return false;
}
function getBlog($id, $con)
{
    $sql = "SELECT * FROM  posts where id ='$id' ";
    $res =   mysqli_query($con, $sql);
    if (mysqli_affected_rows($con) == 1) {
        $post = mysqli_fetch_assoc($res);
        return $post;
    }
    return false;
}
function getBlogs($user_id, $con)
{
    $sql = "SELECT * FROM  posts where user_id ='$user_id' ORDER BY id DESC";
    $res =   mysqli_query($con, $sql);
    $posts = mysqli_fetch_all($res, MYSQLI_ASSOC);
    return $posts;
}
