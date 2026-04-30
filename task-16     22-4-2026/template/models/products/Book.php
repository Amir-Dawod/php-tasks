<?php


class Book extends Product
{
    private  array  $publishers;
    public string $writer;
    public string $color;
    public string $supplier;
    function __construct(string $name, float $price, string $description, string $imageName, string $writer, string $color, string $supplier)
    {
        parent::__construct($name,  $price, $description, $imageName);
        $this->writer = $writer;
        $this->color = $color;
        $this->supplier = $supplier;
    }

    function choosepublisher()
    {
        return $this->publishers[rand(0, count($this->publishers) - 1)];
    }
    function setPublisher(string $publisher)
    {
        if (!isset($_SESSION['publishers'])) {
            $_SESSION['publishers'] = [];
        }
        $_SESSION['publishers'][] = $publisher;


        $this->publishers =  $_SESSION['publishers'];
    }
    function showAllPublishers()
    {
        return  $this->publishers;
    }
}
