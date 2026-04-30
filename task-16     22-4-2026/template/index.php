
<?php

session_start();
require_once "models/Product.php";
require_once "models/products/Book.php";
require_once "models/products/BabyCar.php";
require_once "models/ProductModel.php";
require_once "core/DataBase.php";
require_once "core/validation.php";
require_once "core/functions.php";



$page = $_GET['page'] ?? 'home';

require "views/layout/header.php";
switch ($page) {
    case "home":
        include "views/home.php";
        break;
    case "add_product":
        include "views/add_product.php";
        break;
    case "all_products":
        include "views/all_products.php";
        break;
    case "productController":
        include "controllers/ProductController.php";
        break;
}


require "views/layout/footer.php";
