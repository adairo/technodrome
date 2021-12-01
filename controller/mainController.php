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

    function showHome($status = null, $results = null){
        $last_added = $this->productModel->getLastAdded();
        $all_products = $this->productModel->getAll();
        
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
        session_start();
        if(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true){
            $products = null;
            if (isset($_SESSION['carrito']))
                $products = $_SESSION['carrito'];

            include_once(ROOT_DIRECTORY . '/views/header.php');
            include_once(ROOT_DIRECTORY . '/views/carrito.php');
            include_once(ROOT_DIRECTORY . '/views/footer.php');
        }
        else
            $this->showHome('Inicia sesión para acceder al carrito');
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
    function showMetodoPago(){
        include_once(ROOT_DIRECTORY . '/views/header.php');
        include_once(ROOT_DIRECTORY . '/views/metodopago.php');
        include_once(ROOT_DIRECTORY . '/views/footer.php');
    }

    function showNewMetodoPago(){
        include_once(ROOT_DIRECTORY . '/views/header.php');
        include_once(ROOT_DIRECTORY . '/views/NuevoMetodoPago.php');
        include_once(ROOT_DIRECTORY . '/views/footer.php');
    }

    function showCategory(){
        $productos = $this->productModel->filterByCategory($_REQUEST['cat']);
        $this->showHome(null, $productos);
    }


    function showPedidos(){
        session_start();
        if(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true){
            $id_cliente = $_SESSION["id"];
            $pedido_available = $this->clientModel->isPedidoAvailable($id_cliente);
            //print_r($pedido_available);
            foreach($pedido_available as $idpedido){
                $idpedido = $idpedido;
            }
            if($pedido_available != null){
                $articulos = $this->clientModel->isArticulosPedido($idpedido);
                //print_r($articulos);
            }else{
                echo "No Hay pedidos";
            }
            
            if($articulos != null){
                foreach($articulos as $idarticulo){
                    $id_articulos = $idarticulo['id_articulo'];
                    
                
                    $pedidos = $this->clientModel->isPedido($id_articulos);
                    foreach($pedidos as $productos){
                        $id_producto = $productos['id_producto'];
                    }
                    $producto = $this->clientModel->getProduct($id_producto);
                }
               // print_r($pedidos);
               // print_r($producto);
            }
            include_once(ROOT_DIRECTORY . '/views/header.php');
            include_once(ROOT_DIRECTORY . '/views/pedidos.php');
            include_once(ROOT_DIRECTORY . '/views/footer.php');
        }
        else
            $this->showHome('Inicia sesión para acceder a los pedidos');

    }

    function showDireccion(){
        include_once(ROOT_DIRECTORY . '/views/header.php');
        include_once(ROOT_DIRECTORY . '/views/direccion.php');
        include_once(ROOT_DIRECTORY . '/views/footer.php');
    }


    function NewMetodoPago(){


        if (!empty($_SERVER['REQUEST_METHOD']) && ($_SERVER['REQUEST_METHOD']== 'POST')){
            //  Todos los campos tendrán el atributo required de html, de otra forma habrá que verificar
            //  que no se ingresen campos vacíos
             session_start();
             if(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true){

                $data = array(
                    'tarjeta_2'=> trim($_POST['numerotarjeta']), 'id_cliente' => $_SESSION["id"]
                );
                $this->clientModel->NewMetodoPago($data);
                $this->showShoppingCar('register');
            }
            else
            $this->showHome('Inicia sesión para agregar metodo de pago');
        }
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
                $this->showHome('Registro realizado con éxito');
            }
        }
    }

    function logIn(){
        if (!empty($_SERVER['REQUEST_METHOD']) && ($_SERVER['REQUEST_METHOD']== 'POST')){
            
            //  algún tipo de verificación debería venir aquí :v
            $data = array(
                'email' => trim($_POST['email']),
                'user_pass' => trim($_POST['password'])
            );
            $user = $this->clientModel->logIn($data);
    
            if ($user){
                session_start();
                            
                $_SESSION["loggedin"] = true;
                $_SESSION["id"] = $user['id_cliente'];
                $_SESSION["username"] = $user['nombre'];                            
                
                // Se redirige a la pantalla principal
                $this->showHome('Se inició sesión correctamente');
            }
            else 
                $this->showHome('Usuario y/o contraseña incorrectos');
        }
        print_r($user);
    }

    function logOut(){
        session_start();
        $_SESSION = array();
        session_destroy();

        // Se redirige a la pantalla principal
        $this->showHome('Se cerró la sesión');
    }

    function search(){
        
        $results = null;
       
        if (!empty($_SERVER['REQUEST_METHOD']) && ($_SERVER['REQUEST_METHOD']== 'POST')){
            $search_query = trim($_REQUEST['search-query']);
            if (!empty($search_query)){
                $results = $this->productModel->filterByName($search_query);
                
            }
        }
        $this->showHome(null, $results);
    }

    function addToCar(){

        
        session_start();
        if(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true){
            $producto = $this->productModel->getById($_REQUEST['id_producto']);
            $producto['cantidad'] = 1;
            
            if (empty($_SESSION['carrito'])){ //no existe un carrito aún
                $_SESSION['carrito'] = array($producto);
            }
            else{ // Ya existe el carrito pero falta agregar el producto

                $found = false;
                foreach ($_SESSION['carrito'] as $key => $prod)
                    if ($prod['id_producto'] === $producto['id_producto']){// Ya existe el producto
                        $found = true;
                        break;
                    }
                if (!$found) // El producto no se encuentra en el carrito
                    array_push($_SESSION['carrito'], $producto); 
            }
            $this->showHome('Producto agregado al carrito');
        }

        else 
            $this->showHome("Inicia sesión para agregar productos al carrito");
    }
}