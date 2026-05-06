<?php


// Example with MagicMethod


class   Product
{

    private string $name;
    private string $price;
    public Category $category;

    public function __construct(Category $category)
    {
        $this->category = $category;
    }

    public function __get(string $property)
    {

        return "The Property [ $property ]: is Not Found or Not Accessible  <br> ";
    }

    public function __set(string $property, string  $value)
    {
        echo  "The Property [$property ]: is Not Found or Not Accessible  With argument :  [ $value ]  <br> ";
    }

    public function __call(string $methodName, array $arguments = [])
    {
        echo  "The Method [$methodName ]: is Not Found or Not Accessible  With argument : [" .  implode(",", $arguments) . "] <br>  ";
    }
    public static function __callStatic(string $methodName, array $arguments = [])
    {
        echo "The Method Static [$methodName ]: is Not Found or Not Accessible  With argument :  [" .  implode(",", $arguments) . "] <br> ";
    }

    public function __clone()
    {
        $this->category = clone $this->category;
    }
    public function __toString()
    {
        return "toString <br> ";
    }
    public function __invoke()
    {

        return  "invoke  <br> ";
    }
}


class Category
{
    public string  $name;

    public function __construct(string $name)
    {
        $this->name = $name;
    }
}

$category = new Category('lap');
$product = new Product($category);

/*
------------------------
 get Property 
------------------------
*/

echo $product->name;


/*
------------------------
 set Property 
------------------------
*/

$product->name = 'ahmed';

/*
------------------------
 call Method
------------------------
*/

$product->setName('ahmed');

/*
------------------------
 call  Static  Method
------------------------
*/

Product::setPrice(25);

/*
------------------------
 clone
------------------------
*/

$productClone = clone $product;
var_dump($product);  // object(Category) { ["name"]=> string(3) "lap" } }
echo "<br>";
$productClone->category->name = 'Apple';
var_dump($productClone); //object(Category)#1 (1) { ["name"]=> string(3) "Apple" } }
echo "<br>";

/*
------------------------
 toString
------------------------
*/

echo $product;

/*
------------------------
 invoke
------------------------
*/

echo $product();
