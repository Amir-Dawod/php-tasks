<?php

class ProductModel
{

    private mysqli  $db;
    function __construct()
    {
        $this->db = (new DataBase)->connect();
    }


    function getAllProducts()
    {
        $sql = "SELECT * FROM products ";
        $res = mysqli_query($this->db, $sql);
        if (mysqli_num_rows($res)) {
            return mysqli_fetch_all($res, MYSQLI_ASSOC);
        }
    }
    function setProduct(Book|BabyCar $product, string  $type)
    {

        $name = $product->name;
        $price = $type === "book" ? $product->calcPrice() : $product->getFinalPrice();
        $description = $product->description;
        $imageName = $product->image;
        $publishers = $type === "book" ? implode(',', $product->showAllPublishers()) : '';
        $writer = $product->writer ?? "";
        $color = $product->color ?? "";
        $supplier = $product->supplier ?? "";
        $type = $type;
        $age = $product->age ?? 0;
        $weight = $product->weight ?? 0;
        $materials = $type === "babyCar" ? implode(",", $product->displayMaterials()) : '';
        $sql = "INSERT into products (`name`, `price`, `description`, `imageName`, `publishers`,`writer`,  `color`,  `supplier`,`type`,`age`,`weight`,`materials`) values('$name', '$price',' $description', '$imageName','$publishers',' $writer' , '$color', ' $supplier','$type', '$age',' $weight', '$materials') ";
        mysqli_query($this->db, $sql);
    }
}
