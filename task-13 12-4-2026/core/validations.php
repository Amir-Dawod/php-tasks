<?php




function validateRequired($fieldName, $value)
{
    return empty($value) ? " $fieldName is required" : null;
}

function validateName($name)
{
    return  preg_match("/^[a-zA-Z ]+$/", $name) ? null : 'invalid Name';
}
function validateEmail($email)
{
    return filter_var($email, FILTER_VALIDATE_EMAIL) ? null : " Email  is invaild";
}
function validatePhone($phone)
{
    $clean = preg_replace("/[\s\-\(\)]/", "", $phone);
    return  preg_match("/^\+[0-9]{7,15}$/", $clean)  ? null : " invalid Phone ";
}
function validatePassword($password)
{
    if (!preg_match("/[A-Z]/", $password)) {
        return "password must be contains char capital";
    }
    if (!preg_match("/[a-z]/", $password)) {
        return "password must be contains char small";
    }
    if (strlen($password) < 6) {
        return "password must be not  lower than 6";
    }
}

function  validateRegister($name, $email, $phone, $password)
{
    $fields = [
        'name' => $name,
        'email' => $email,
        'phone' =>  $phone,
        'password' => $password
    ];
    foreach ($fields as $fieldName => $value) {
        if ($error = validateRequired($fieldName, $value)) {
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
    if ($error = validatePassword($password)) {
        return $error;
    }
}

function  validateLogin( $email, $password)
{
    $fields = [
        'email' => $email,
        'password' => $password
    ];
    foreach ($fields as $fieldName => $value) {
        if ($error = validateRequired($fieldName, $value)) {
            return $error;
        }
    }
   
    if ($error = validateEmail($email)) {
        return $error;
    }
    if ($error = validatePassword($password)) {
        return $error;
    }
}
