<?php


class BabyCar extends Product
{
    public int $age;
    public float $weight;
    private  array $materials;
    private float  $specialTax;

    function __construct(string $name, float $price, string $description, string $imageName, int $age, float $weight,  float  $specialTax)
    {
        parent::__construct($name, $price, $description, $imageName);
        $this->age = $age;
        $this->weight = $weight;
        $this->specialTax = $specialTax;
    }

    function displayMaterials()
    {

        return  $this->materials;
    }
    function setMaterials(string $material, array $oldMaterials)
    {
       
        $this->materials = [...$oldMaterials, $material];
    }
    function getFinalPrice()
    {
        return $this->price - (($this->price * $this->specialTax) / 100);
    }
}
