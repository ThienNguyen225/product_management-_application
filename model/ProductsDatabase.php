<?php

namespace Model;
class ProductsDatabase
{
    public $connection;

    public function __construct($connection)
    {
        $this->connection = $connection;
    }

    public function create($product)
    {
        $structuredQueryLanguage = 'INSERT INTO products(productName, productProducer, productPrice, productQuantity) VALUES (?, ?, ?, ?)';
        $statement = $this->connection->prepare($structuredQueryLanguage);
        $statement->bindParam(1, $product->productName);
        $statement->bindParam(2, $product->productProducer);
        $statement->bindParam(3, $product->productPrice);
        $statement->bindParam(4, $product->productQuantity);
        return $statement->execute();
    }

    public function getAll()
    {
        $structuredQueryLanguage = "SELECT * FROM products";
        $statement = $this->connection->prepare($structuredQueryLanguage);
        $statement->execute();
        $result = $statement->fetchAll();
        $products = [];
        foreach ($result as $row) {
            $product = new Products($row['productName'], $row['productProducer'], $row['productPrice'], $row['productQuantity']);
            $product->id = $row['id'];
            array_push($products, $product);
        }
        return $products;
    }

    public function get($id)
    {
        $structuredQueryLanguage = "SELECT * FROM products WHERE id = ?";
        $statement = $this->connection->prepare($structuredQueryLanguage);
        $statement->bindParam(1, $id);
        $statement->execute();
        $row = $statement->fetch();
        $product = new Products($row['productName'], $row['productProducer'], $row['productPrice'], $row['productQuantity']);
        $product->id = $row['id'];
        return $product;
    }

    public function delete($id)
    {
        $structuredQueryLanguage = "DELETE FROM products WHERE id = ?";
        $statement = $this->connection->prepare($structuredQueryLanguage);
        $statement->bindParam(1, $id);
        return $statement->execute();
    }

    public function update($id, $product){
        $structuredQueryLanguage = "UPDATE products SET productName = ?, productProducer = ?, productPrice = ?, productQuantity = ? WHERE id = ?";
        $statement = $this->connection->prepare($structuredQueryLanguage);
        $statement->bindParam(1, $product->productName);
        $statement->bindParam(2, $product->productProducer);
        $statement->bindParam(3, $product->productPrice);
        $statement->bindParam(4, $product->productQuantity);
        $statement->bindParam(5, $id);
        $statement->execute();
    }

}