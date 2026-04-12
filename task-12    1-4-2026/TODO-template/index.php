<?php
session_start();
require_once "config/config.php";
require_once "database/connection.php";
require_once "core/functions.php";
require_once "core/validations.php";

$page = $_GET['page'] ?? 'home';

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
  case "create_handle_task":
    include "handelers/store_tasks.php";
    break;
  case "update_handle_task":
    include "handelers/update_task.php";
    break;
  case "delete_handle_task":
    include "handelers/delete_task.php";
    break;
}
