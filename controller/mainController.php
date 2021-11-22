<?php

include_once(ROOT_DIRECTORY . '/model/ProductoModel.php');

class MainController{
    private $productModel;

    function __construct(){
        $this->productModel = new ProductoModel();
    }

    function showHome(){
        $last_added = $this->productModel->getLastAdded();
        
        include_once(ROOT_DIRECTORY . '/views/header.php');
        include_once(ROOT_DIRECTORY . '/views/main.php');
        include_once(ROOT_DIRECTORY . '/views/footer.php');
    }

    function showProduct(){
       
        $product = $this->productModel->getByID($_REQUEST['id_producto']);

        include_once(ROOT_DIRECTORY . '/views/header.php');
        include_once(ROOT_DIRECTORY . '/views/product.php');
        include_once(ROOT_DIRECTORY . '/views/footer.php');
    }

    function showShoppingCar(){

        include_once(ROOT_DIRECTORY . '/views/header.php');
        include_once(ROOT_DIRECTORY . '/views/carrito.html');
        include_once(ROOT_DIRECTORY . '/views/footer.php');
    }

    function logIn(){
        include_once(ROOT_DIRECTORY . '/views/header.php');
        include_once(ROOT_DIRECTORY . '/views/login.php');
        include_once(ROOT_DIRECTORY . '/views/footer.php');
    }

    function signUp(){
        include_once(ROOT_DIRECTORY . '/views/header.php');
        include_once(ROOT_DIRECTORY . '/views/signup.php');
        include_once(ROOT_DIRECTORY . '/views/footer.php');
    }
}