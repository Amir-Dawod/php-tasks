<?php

require "./Config/config.php";
require "./vendor/autoload.php";

use App\Cart;
use App\CartItem;
use App\DataBase;
use App\Product;

$pdo = (new DataBase)->getConnection();

$product= Product::create($pdo, "laptop", 5000);

