<?php

if (requestMethod('POST')) {
    foreach ($_POST as $field => $value) {
        $$field = fieldSanitization($value);
    }
    $imageName = $_FILES['image']['name'];
    $imageTmpName = $_FILES['image']['tmp_name'];
    $imageSize = $_FILES['image']['size'];
    $imageExtension = pathinfo($imageName, PATHINFO_EXTENSION);
    $error = validateProduct($name, $price, $imageName, $description, $type, $imageTmpName, $imageExtension, $imageSize);

    if (!empty($error)) {
        setMessage('danger', $error);
        header('location:index.php?page=add_product');
        exit();
    }

    $model = new ProductModel();
    if ($type === 'book') {

        $book = new Book($name, $price, $description, $imageName, $writer,  $color,  $supplier);
        $book->uploadImage($imageTmpName);
        $book->setPublisher($publisher);
        $model->setProduct($book, $type);
    } elseif ($type === 'babyCar') {
        $babyCar = new BabyCar($name, $price, $description, $imageName, $age, $weight, 15);
        $babyCar->uploadImage($imageTmpName);
        $babyCar->setMaterials($material);
        $model->setProduct($babyCar, $type);
    }

    header('location:index.php?page=all_products');
    die();
}
