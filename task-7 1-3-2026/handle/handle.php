<?php
require("../core/validation.php");
require("../core/function.php");

if (requestMethod("POST") ) {
  foreach ($_POST as $field => $value) {
        $$field = fieldSanitization($value);
    }
    $error = validateRegister($name, $email,  $phone, $message);

    // check error
    if (empty($error)) {
        addUser($name, $email, $phone, $message);
        setMessage("success", "login successfully");
        header('location:../views/contact.php');
    } else {

        setMessage("danger", $error);
        header('location:../views/contact.php');
    }
}
