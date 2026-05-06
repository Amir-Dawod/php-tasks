<?php

require "./Validator/Validation.php";
$data = [];
if ($_SERVER['REQUEST_METHOD'] == "POST") {
   foreach ($_POST as $field => $value) {
      $data[$field] = trim(htmlspecialchars(htmlentities($value)));
   }
}
$validation = new Validation();

$validation->validate(
   $data,
   [
      "name" => ["required", "string"],
      "email" => ["required", "email"],
      "phone" => ["required", "numeric"],
      "password" => ["required", "password", "min:8"],
      "confirm_password" => ["required", "password_match"]


   ],

);


if(empty($validation->getErrors())){
   $_SESSION['errors']=$validation->getErrors();
}else{
   header("location:indexcc.php");
   header("location:indexcc.php");
}
echo "<pre>";
print_r($validation->getErrors());
echo "</pre>";
