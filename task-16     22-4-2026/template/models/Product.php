<?php


class Product
{
    public string $name;
    public float  $price;
    public string  $description;
    public string  $image;

    function __construct(string $name, float $price, string $description, string $imageName)
    {
        $this->name = $name;
        $this->price = $price;
        $this->description = $description;
        $this->image = $imageName;
    }

    function uploadImage(string  $imageTmpName)
    {
        $path = __DIR__ . "/../assets/uploads/" . $this->image;
        move_uploaded_file($imageTmpName, $path);
    }
    function calcPrice()
    {
        return $this->price - (($this->price * 10) / 100);  // price with discount 10%

    }
}
