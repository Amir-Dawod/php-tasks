<?php
session_start();
require "./Validator/Validation.php";
$data = [];
if ($_SERVER['REQUEST_METHOD'] == "POST") {
   foreach ($_POST as $field => $value) {
      $data[$field] = trim(htmlspecialchars(htmlentities($value)));
   }

   $validation = new Validation();

   $validation->validate(
      $data,
      [
         "name" => ["required", "string", "min:6", "max:20"],
         "email" => ["required", "email"],
         "phone" => ["required", "phone"],
         "password" => ["required", "password", "min:8"],
         "confirm_password" => ["required", "password_match"]


      ],

   );

   if (!empty($validation->getErrors())) {
      $_SESSION['errors'] = $validation->getErrors();
   }
   header("location:index.php");
   exit();
}
