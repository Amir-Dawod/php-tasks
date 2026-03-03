<?php

session_start();
function validateRequired($value, $fieldName)
{

    return empty($value) ? "$fieldName is required" : null;
}

function validateName($name)
{

        
    // return htmlspecialchars(filter_var($name,FILTER_SANITIZE_STRING)); stop any script xss but the problem is the user can  write anything not logical 
   
    return  preg_match("/^[ a-zA-Z]+$/", $name) ? null : 'invalid Name'; // stop any script xss with Solving the problem 
}
function validateEmail($email)
{
    return  filter_var($email, FILTER_VALIDATE_EMAIL) ? null : "invalid Email";
}
function validatePhone($phone)
{
    ## check phone number (egypt only) 01227155690
    // return preg_match("/^[0-9]+$/", $phone) ? null : "invalid Phone"; 


    // check phone number (all national)
    return preg_match("/^[0-9 + ( ) -]+$/", $phone) ? null : "invalid Phone";  // +1 (709) 501-1134 used by fake data
}
function validatePassword($password)
{
    return  password_hash($password, PASSWORD_DEFAULT);
}


function validateRegister($name, $email, $password, $phone)
{

    $fields = [
        "name" => $name,
        "email" => $email,
        "password" => $password,
        "phone" => $phone
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
}
