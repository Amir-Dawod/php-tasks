<?php

require_once "database/connection.php";


//  routing

$page = $_GET['page'] ?? "home";
switch ($page) {
  case "home":
    include "views/home.php";
    break;
  case "create_task":
    include "views/create_task.php";
    break;
  case "update_task":
    include "views/update_task.php";
    break;
  case "update_task":
    include "views/update_task.php";
    break;
}
