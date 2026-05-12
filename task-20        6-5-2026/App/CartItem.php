<?php

namespace App;

use App\Product;

class  CartItem
{

    //    private Product $product;
    //    private int  $quantity;
    
    public function __construct( private Product $product, private int  $quantity) {
        $this->product = $product;
        $this->quantity = $quantity;
    }

    function getProduct()
    {
        return $this->product;
    }
    function getQuantity(): int
    {
        return $this->quantity;
    }
    function setQuantity(int $qty)
    {
        $this->quantity = $qty;
    }
    function getSubTotal()
    {
        return  $this->quantity * $this->product->getPrice();
    }
    public  function toArray()
    {

        return [
            "product" => [
                'id' => $this->product->getId(),
                'name' => $this->product->getName(),
                'price' => $this->product->getPrice()
            ],
            "qty" => $this->quantity
        ];
    }
    public static function fromArray(array $data)
    {
        $productData = $data['product'];
        $product = new Product($productData['id'], $productData['name'], $productData['price']);
        return new CartItem($product, $data['qty']);
    }
}
