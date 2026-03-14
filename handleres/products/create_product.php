<?php
require("../../core/functions.php");
require("../../core/validation.php");

if (!isset($_SESSION['user']) || $_SESSION['user']['role'] != "admin") {
    die("Access Denied");
}
if (requestMethod('POST')) {
    $title = fieldSanitization($_POST['title']);
    $price = $_POST['price'];
    $imageName = $_FILES['image']['name'];
    $imageTmpName = $_FILES['image']['tmp_name'];
    $imageSize = $_FILES['image']['size'];

    $error = validateProduct($imageName, $title, $price);
    if (!empty($error)) {
        setMessage("danger", $error);
        header("location: ../../views/cart/create_cart.php");
        exit();
    }
    createProduct($title, $price, $imageName, $imageTmpName, $imageSize);
    setMessage("success", "succcess added cart ");
    header("location: ../../views/admin/products/create_product.php");
    exit();
}
