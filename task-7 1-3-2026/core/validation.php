<?php
function validateRequired($value, $fieldName)
{

    return empty($value) ? "$fieldName is required" : null;
}

function validateName($name)
{
    return  preg_match("/^[a-zA-Z ]+$/", $name) ? null : ' Name  is not valid'; 
}
function validateEmail($email)
{
    return  filter_var($email, FILTER_VALIDATE_EMAIL) ? null : "Email is not valid";
}
function validatePhone($phone)
{

    // check phone number (EG | SAU)
     return  preg_match("/^(\+966|\+20)[0-9]{9}$/",$phone) ? null : "  Phone  is not valid";  
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



