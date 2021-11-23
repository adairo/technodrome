<?php

include_once('model/ProductoModel.php');
include_once('model/ClienteModel.php');

class MainController{
    private $productModel;
    private $clientModel;

    function __construct(){
        $this->productModel = new ProductoModel();
        $this->clientModel = new ClienteModel(); 
    }

    function showHome($status = null){
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

    function showLogIn(){
        include_once(ROOT_DIRECTORY . '/views/header.php');
        include_once(ROOT_DIRECTORY . '/views/login.php');
        include_once(ROOT_DIRECTORY . '/views/footer.php');
    }

    function showSignUp(){
        include_once(ROOT_DIRECTORY . '/views/header.php');
        include_once(ROOT_DIRECTORY . '/views/signup.php');
        include_once(ROOT_DIRECTORY . '/views/footer.php');
    }

    function showPedidos(){
        include_once(ROOT_DIRECTORY . '/views/header.php');
        include_once(ROOT_DIRECTORY . '/views/pedidos.php');
        include_once(ROOT_DIRECTORY . '/views/footer.php');
    }

    function showDireccion(){
        include_once(ROOT_DIRECTORY . '/views/header.php');
        include_once(ROOT_DIRECTORY . '/views/direccion.php');
        include_once(ROOT_DIRECTORY . '/views/footer.php');
    }

    function signUp(){

        if (!empty($_SERVER['REQUEST_METHOD']) && ($_SERVER['REQUEST_METHOD']== 'POST')){
            //  Todos los campos tendrán el atributo required de html, de otra forma habrá que verificar
            //  que no se ingresen campos vacíos

            if (trim($_POST['password']) == trim($_POST['cpassword'])){
                
                $data = array(
                    'nombre'=> trim($_POST['first_name']),
                    'apellidos' => trim($_POST['last_name']),
                    'email' => trim($_POST['email']),
                    'user_pass' => trim($_POST['password'])
                );
                $this->clientModel->signUp($data);
                $this->showHome('register');
            }
        }
    }
}