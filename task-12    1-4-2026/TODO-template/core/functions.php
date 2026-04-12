<?php


function requestMethod($method)
{
    if ($_SERVER['REQUEST_METHOD'] == $method) {
        return true;
    }
    return false;
}
function setMessage($type, $message, $fieldName)
{
    $_SESSION['errors'][$fieldName] = [
        "type" => $type,
        "text" => $message
    ];
}


function showMessage($fieldName)
{

    if (isset($_SESSION['errors'][$fieldName])) {
        $type = $_SESSION['errors'][$fieldName]['type'];
        $text = $_SESSION['errors'][$fieldName]['text'];
        echo "<div class= 'alert alert-$type'> $text</div>";
        unset($_SESSION['errors']);
    }
}


function status_priority($type)
{
    if ($type == "high") {
        return "danger";
    } elseif ($type == "medium") {
        return "warning";
    } else {

        return "success";
    }
}
