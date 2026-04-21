<?php
if (requestMethod('POST')) {

  foreach ($_POST as $field => $value) {
    $$field = fieldSanitation($value);
  }
  $error = validateRegister($name, $email, $phone, $password);
  if (!empty($error)) {
    setMessage('danger', $error);
    header('location:index.php?page=register');
    exit();
  }
  try {
    if (blogRegister($name, $email, $phone, $password, $con)) {
      setMessage('success', 'added user successfully');
      header('location:index.php?page=register');
      exit();
    }
  } catch (Exception $e) {

    setMessage('danger', 'email is exists');
    file_put_contents('log/application.php', date('y-m-d h:m:s') . $e->getMessage()."\n", FILE_APPEND);
    header('location:index.php?page=register');
    exit();
  }
}
