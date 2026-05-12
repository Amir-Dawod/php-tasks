<?php


namespace App;

use App\CartItem;

class Cart
{

    private array $items = [];
    private const SESSION_KEY = "cart_items";
    public function __construct()
    {
        if (isset($_SESSION['cart_items'])) {
            $this->items = $this->loadFromSession($_SESSION[self::SESSION_KEY]);
        }
    }

    private function loadFromSession(array $data)
    {
        $this->items = [];
        foreach ($data as $itemProduct) {
            $this->items[] = CartItem::fromArray($itemProduct);
        }
        return $this->items;
    }
    private function saveToSession()
    {
        $data = [];
        foreach ($this->items as $item) {
            $data[] = $item->toArray();
        }
        $_SESSION[self::SESSION_KEY] = $data;
    }
    public function addItem(Product $product, int $qty)
    {
        foreach ($this->items as $item) {
            if ($item->getProduct()->getId() == $product->getId()) {
                $item->setQuantity($item->getQuantity() + $qty);
                $this->saveToSession();
                return;
            }
            $this->items[] = new CartItem($product, $qty);
            $this->saveToSession();
            return;
        }
    }
    public function moveItem(Product $product)
    {
        for ($i = 0; $i < count($this->items); $i++) {
            if ($this->items[$i]->getProduct()->getId() == $product->getId()) {
                unset($this->items[$i]);
                $this->items = array_values($this->items);
                $this->saveToSession();
                return;
            }
        }
    }
    public function UpdateItem(Product $product, int $qty) 
    {
        foreach ($this->items as $item) {
            if ($item->getProduct()->getId() == $product->getId()) {
                $item->setQuantity($qty);
                $this->saveToSession();
                return;
            }
        }
    }
}
