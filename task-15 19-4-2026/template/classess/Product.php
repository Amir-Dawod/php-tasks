<?php



class Product
{
    private string $name;
    public string $brand;
    public string $image;
    public string $description;
    public float $price;
    private float $tax;
    private float  $priceAfterDiscount;
    function __construct(string  $name, string  $brand, string $img, string $des, float $price, float $tax)
    {
        $this->name = $name;
        $this->brand = $brand;
        $this->image = $img;
        $this->description = $des;
        $this->price = $price;
        $this->tax = $tax;
    }
    function getName(): string
    {
        return $this->name;
    }
    function priceAfterDiscount(float $number = 0): float
    {
        $this->priceAfterDiscount =   $this->price - (($this->price  * $number) / 100);
        return   $this->priceAfterDiscount;
    }
    function getFinalPrice(): float
    {
        return $this->priceAfterDiscount +  (($this->priceAfterDiscount  * $this->tax) / 100);
    }
}

$prod1 = new Product("HP Pavilion 15", "HP", "https://images.unsplash.com/photo-1588872657578-7efd1f1555ed", "لابتوب اقتصادي مناسب للاستخدام اليومي والدراسة", 2800, 8);
$prod2 = new Product("MacBook Air M2", "Apple", "https://images.unsplash.com/photo-1517336714731-489689fd1ca8", " أداء قوي جداً وبطارية ممتازة للمطورين والمصممين", 3500, 12);
$prod3 = new Product("Dell XPS 13", "Dell", "https://images.unsplash.com/photo-1593642634315-48f5414c3ad9", "لابتوب خفيف وقوي مناسب للبرمجة والشغل الاحترافي", 7500, 15);

$products = [$prod1, $prod2, $prod3];
