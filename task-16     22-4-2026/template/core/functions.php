<?php


function requestMethod(string  $method): bool
{
    if ($_SERVER['REQUEST_METHOD'] == $method) {
        return true;
    }
    return false;
}



function fieldSanitization(string  $value): string
{
    return htmlspecialchars(trim($value));
}


function setMessage(string $type, string $message): void
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
        echo "<div class= 'alert alert-$type' > $text</div>";
        unset($_SESSION['message']);
    }
}
