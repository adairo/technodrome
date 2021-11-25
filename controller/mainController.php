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


    function showPedidos(){
        $pedido_available = $this->clientModel->isPedidosAvailable();
        if($pedido_available != null){
            $articulos = $this->clientModel->isArticulosPedido();
        }
        if($articulos != null){
            $pedidos = null; // ???
        }
    

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
                header("location: index.php");
            }
            else 
                echo 'no existe';
        }
        print_r($user);
    }

    function logOut(){
        session_start();
        $_SESSION = array();
        session_destroy();

        // Se redirige a la pantalla principal
        header("location: index.php");
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

                foreach ($_SESSION['carrito'] as $key => $prod){
                    if ($prod['id_producto'] == $producto['id_producto'])// Ya existe el producto
                        $_SESSION['carrito'][$key]['cantidad'] += 1;
                    else{
                        $_SESSION['carrito'][count($_SESSION['carrito'])] = $producto; //Se debería insertar en la última posición
                    }
                }
            }
            print_r($_SESSION['carrito']);
            $this->showHome('Producto agregado al carrito');
        }

        else 
            $this->showHome("Inicia sesión para agregar productos al carrito");
    }
}