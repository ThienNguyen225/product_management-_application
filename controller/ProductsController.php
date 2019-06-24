<?php

namespace Controller;

use Model\Products;
use Model\ProductsDatabase;
use Model\DatabaseConnect;

ob_start();

class ProductsController
{
    public $productDatabase;

    public function __construct()
    {
        $dataSourceName = 'mysql:host=localhost;dbname=product_management _application';
        $userName = 'root';
        $passWord = '12345678';
        $connect = new DatabaseConnect($dataSourceName, $userName, $passWord);
        $this->productDatabase = new ProductsDatabase($connect->connect());
    }

    public function add()
    {
        if ($_SERVER["REQUEST_METHOD"] === "GET") {
            include "view/add.php";
        } else {
            $productName = $_POST['name'];
            $productProducer = $_POST['producer'];
            $productPrice = $_POST['price'];
            $productQuantity = $_POST['quantity'];

            $product = new Products($productName, $productProducer, $productPrice, $productQuantity);
            $this->productDatabase->create($product);

            $message = 'Products created';
            include 'view/add.php';
        }
    }

    public function index(){
        $products = $this->productDatabase->getAll();
        include "view/list.php";
    }

    public function delete(){
        if ($_SERVER['REQUEST_METHOD'] === "GET"){
            $id = $_GET['id'];
            $product = $this->productDatabase->get($id);
            include "view/delete.php";
        }else{
            $id = $_POST['id'];
            $this->productDatabase->delete($id);
            header('Location: index.php');
        }
    }

    public function edit(){
        if ($_SERVER['REQUEST_METHOD'] === "GET"){
            $id = $_GET['id'];
            $product = $this->productDatabase->get($id);
            include "view/edit.php";
        }else{
            $id = $_POST['id'];
            $product = new Products($_POST['name'], $_POST['producer'], $_POST['price'], $_POST['quantity']);
            $this->productDatabase->update($id, $product);
            header('Location: index.php');
        }
    }
}