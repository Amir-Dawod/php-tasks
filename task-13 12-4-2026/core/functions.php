<?php


function requestMethod($method)
{
    if ($_SERVER['REQUEST_METHOD'] == $method) {
        return true;
    }
    return false;
}

function fieldSanitazion($value)
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
                'name' => $user['name'],
                'email' => $user['email'],
            ];
            return true;
        }
    }
    return false;
}


