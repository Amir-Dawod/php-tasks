<?php
function validateRequired($value, $fieldName)
{

    return empty($value) ? "$fieldName is required" : null;
}

function validateName($name)
{


    // return htmlspecialchars(filter_var($name,FILTER_SANITIZE_STRING)); stop any script xss but the problem is the user can  write anything not logical 

    return  preg_match("/^[a-zA-Z ]+$/", $name) ? null : ' Name  is not valid'; // stop any script xss with Solving the problem 
}
function validateEmail($email)
{
    return  filter_var($email, FILTER_VALIDATE_EMAIL) ? null : "Email is not valid";
}
function validatePhone($phone)
{

    // check phone number (all national)
    return is_numeric($phone) && preg_match("/^(\+20|\+966)[0-9]{9}$/", "+20127188280") ? null : "  Phone  is not valid";  // +1 (709) 501-1134 used by fake data
}
function validateMessage($message)
{
    return  preg_match("/^[ a-zA-Z]+$/", $message) ? null : ' Message  is not valid';
}


function validateRegister($name, $email, $phone, $message)
{

    $fields = [
        "name" => $name,
        "email" => $email,
        "phone" => $phone,
        "message" => $message
    ];

    foreach ($fields as $fieldName => $value) {

        if ($error = validateRequired($value, $fieldName)) {

            return $error;
        }
    }


    if ($error = validateName($name)) {
        return $error;
    }
    if ($error = validateEmail($email)) {
        return $error;
    }

    if ($error = validatePhone($phone)) {
        return $error;
    }
    if ($error = validateMessage($message)) {
        return $error;
    }
}
