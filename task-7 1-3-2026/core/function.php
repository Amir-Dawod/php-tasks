<?php
 session_start();



 function requestMethod($method)
{
    if ($_SERVER['REQUEST_METHOD'] == $method) {
        return true;
    }
    return false;
}
function fieldSanitization($value)
{
    return htmlspecialchars(trim($value));
}
function setMessage($type, $message)
{
    $_SESSION['message'] = [
        "type" => $type,
        "text" => $message
    ];
}
function showMessage()
{

    if (isset($_SESSION['message'])) {
        $type = $_SESSION['message']['type'];
        $text = $_SESSION['message']['text'];
        echo "<div class= 'alert alert-$type mb-2' > $text</div>";
        unset($_SESSION['message']);
    }
}

function addUser($name, $email, $phone, $message)
{
    $usersJson = "../data/users.json";
    $user = [
        "name" => $name,
        "email" => $email,
        "phone" => $phone,
        "message" => $message
    ];
    $old_data = json_decode(file_get_contents($usersJson), true);

    if (empty($old_data)) {
        $old_data = [];
    }
    $old_data[] = $user;
    file_put_contents($usersJson, json_encode($old_data, JSON_PRETTY_PRINT));
}
