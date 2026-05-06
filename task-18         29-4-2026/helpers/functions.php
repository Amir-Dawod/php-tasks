<?php




function showMessage(string $field)
{
    if (isset($_SESSION['errors'][$field])) {
        foreach ($_SESSION['errors'][$field] as $error) {
            echo "<div class='alert alert-danger m-2 '> {$error} </div>";
        }
        unset($_SESSION['errors'][$field]);
    }
}
