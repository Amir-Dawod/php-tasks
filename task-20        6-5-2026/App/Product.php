<?php


namespace App;

use PDO;

class Product
{


    // private int $id;
    // private string $name;
    // private float $price;

    public function __construct(private int $id,   private string $name, private float $price)
    {
        $this->id = $id;
        $this->name = $name;
        $this->price = $price;
    }


    function getId(): int
    {
        return $this->id;
    }
    function getName(): string
    {
        return $this->name;
    }
    function getPrice(): float
    {
        return $this->price;
    }

    public static function  create(PDO $pdo, string $name, float $price)
    {

        $sql = "INSERT INTO `products` (name,price) VALUES(?,?) ";
        $stmt = $pdo->prepare($sql);
        $success = $stmt->execute([$name, $price]);
        if ($success) {
            $id = $pdo->lastInsertId();
            return new self($id, $name, $price);
        }
        return "not found";
    }
    public static function getProducts(PDO $pdo): array
    {
        $sql = "SELECT  * FROM  `products` ";
        $stmt = $pdo->query($sql);
        $products = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $products;


        /*  
       ------------------
       - Another solution
       ------------------
       $sql = "SELECT  * FROM  `products` ";
       $stmt = $pdo->prepare($sql);
       $stmt->execute();
       $products = $stmt->fetchAll(PDO::FETCH_ASSOC);
       return $products;
       */
    }
    public static function findById(PDO $pdo, int $id): ?Product  // type ( Product | null )
    {
        $sql = "SELECT  * FROM  `products`  WHERE id = ?";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$id]);
        $product = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($product) {
            return new Product($product["id"], $product["name"], $product['price']);
        }
        return null;
    }
}
