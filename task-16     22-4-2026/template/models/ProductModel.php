<?php

class ProductModel
{

    private mysqli  $db;

    // Connection object to MySQL database
    function __construct()
    {
        // Initialize database connection
        $this->db = (new DataBase)->connect();
    }

    // =========================
    // Get latest materials from babycars table
    // =========================
    function getMaterials(): array
    {
        $sql = "SELECT materials FROM  babycars ORDER BY id DESC  limit 1 ";

        $res = mysqli_query($this->db, $sql);
        if (mysqli_num_rows($res)) {
            $materials = mysqli_fetch_row($res);
            return  $materials;
        }
        return [];
    }

    // =========================
    // Get latest publishers from books table
    // =========================
    function getPublishers(): array
    {
        $sql = "SELECT publishers FROM  books ORDER BY id DESC  limit 1";

        $res = mysqli_query($this->db, $sql);
        if (mysqli_num_rows($res)) {
            $publishers = mysqli_fetch_row($res);
            return  $publishers;
        }
        return [];
    }


    // =========================
    // Get products with their type (JOIN with subtype table)
    // Example: books / babycars
    // =========================
    function getProductsWithType(string $type)
    {
        $sql = "SELECT * FROM products  JOIN $type   ON products.id = $type.product_id ";

        $res = mysqli_query($this->db, $sql);
        if (mysqli_num_rows($res)) {
            return mysqli_fetch_all($res, MYSQLI_ASSOC);
        }
    }
    // =========================
    // Insert into BOOKS table
    // =========================

    function insertBook(Book $product, int $product_id)
    {

        $writer = $product->writer;
        $color = $product->color;
        $supplier = $product->supplier;

        $publishers =  implode(',', $product->showAllPublishers());  // Convert publishers array → string for DB storage 

        $sql_book = "INSERT into books (`writer`, `color`, `supplier`, `publishers`, `product_id`)  values('$writer',' $color' , '$supplier', ' $publishers','$product_id')";
        mysqli_query($this->db, $sql_book);
    }
    // =========================
    // Insert into BABYCARS table
    // =========================
    function insertBabyCar(BabyCar $product, int  $product_id)
    {
        $age = $product->age;
        $weight = $product->weight;

        $materials = implode(',', $product->displayMaterials()); 

        // Convert publishers array → string for DB storage
        $sql_babycar = "INSERT into babycars (`age`,`weight`,`materials`, `product_id`)   values('$age', '$weight',' $materials', '$product_id')";
        mysqli_query($this->db, $sql_babycar);
    }
    function setProduct(Book|BabyCar $product, string  $type)
    {
        // =========================
        // Insert into main products table
        // =========================

        $name = $product->name;
        $price = $type === "books" ? $product->calcPrice() : $product->getFinalPrice();
        $description = $product->description;
        $imageName = $product->image;
        $type = $type;
        $sql_product = "INSERT into products (`name`, `price`, `description`, `imageName`, `type`)   values('$name', '$price',' $description', '$imageName','$type')";
        mysqli_query($this->db, $sql_product);


        // Get last inserted product ID (foreign key usage)
        $product_id = mysqli_insert_id($this->db);

        if ($type ==  "books") {
            $this->insertBook($product, $product_id);
        } elseif ($type ==  "babyCars") {
            $this->insertBabyCar($product, $product_id);
        }
    }
}



