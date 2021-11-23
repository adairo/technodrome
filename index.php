<?php
    require_once('db/connection.php');
    require_once('controller/mainController.php');
    require_once('controller/productController.php');
    
    /* holaaa */
    $main_controller = new MainController();

    if (isset($_REQUEST['method'])){
        $method = $_REQUEST['method'];
        if (method_exists($main_controller, $method))
            $main_controller->$method();
        else
            $main_controller->showHome();
    }
    else{
        $main_controller->showHome();
    }

        