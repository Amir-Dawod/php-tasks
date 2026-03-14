<?php
require("../../core/functions.php");
require("../../core/validation.php");
if (!isset($_SESSION['user']) || $_SESSION['user']['role'] != "admin") {
    die("Access Denied");
}
if (requestMethod('POST')) {
    $id = $_POST['id'];
    $title = fieldSanitization($_POST['title']);
    $price = $_POST['price'];
    $imageName = $_FILES['image']['name'];
    $imageTmpName = $_FILES['image']['tmp_name'];
    $imageSize = $_FILES['image']['size'];
    $error = validateProduct($title, $price);
    if (!empty($error)) {
        setMessage("danger", $error);
        header("location: ../../views/pages/edit_product.php");
        exit();
    }
    editProduct($id, $title, $price, $imageName, $imageTmpName, $imageSize);
    setMessage("success", "succcess edit product ");
    header("location: ../../index.php");
    exit();
}
