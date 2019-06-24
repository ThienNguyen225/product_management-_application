<?php
namespace Model;

class Products
{
    public $id;
    public $productName;
    public $productProducer;
    public $productPrice;
    public $productQuantity;

    public function __construct($productName, $productProducer, $productPrice, $productQuantity)
    {
        $this->productName = $productName;
        $this->productProducer = $productProducer;
        $this->productPrice = $productPrice;
        $this->productQuantity = $productQuantity;

    }
}