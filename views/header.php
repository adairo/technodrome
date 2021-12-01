<?php 
  session_start();
?>
<!DOCTYPE html>
<html lang="es-MX">
  <head>
    <title>TECHNODROME STORE</title>
    
    <link rel="shortcut icon" href="logo1.jpg">
    <meta charset="UTF-8">
    

    <!-- header css-->
    <link rel="stylesheet" href="style/css/header.css">
    
  </head>
  <header>

    <!-- Barra Busqueda -->
    <div class='header-top'>
      <p>Technodrome</p>
      
      <form id='search-field' method='POST' action='index.php?method=search'>
        <input type="text" class='search-bar' placeholder="Buscar en la página" name='search-query'>
        <input type="submit" value='Buscar'>
      </form>

      <div class="user-actions">
        <ul>
          <?php 
            if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true){
              echo '<li>Bienvenido '. $_SESSION['username']. '</li>';
              echo "<li><a href='index.php?method=logOut'>Cerrar sesión</a></li>";
            }
            else
              echo "<li><a href='index.php?method=showLogIn'>Iniciar sesión</a></li>";
          ?>

          <li><a href="">Mis pedidos</a></li>
          <li><a href="index.php?method=showShoppingCar">Carrito</a></li>
        </ul>
      </div> 
    </div>

    <div class="header-bottom">
      <ul>
        <li><a href="index.php">Inicio</a></li>

        <li><a href="index.php?method=showCategory&cat=PC">PC</a></li>
        <li><a href="index.php?method=showCategory&cat=Componentes">Componentes</a></li>
        <li><a href="index.php?method=showCategory&cat=GPU">GPU</a></li>
        <li><a href="index.php?method=showCategory&cat=Power%20Supply">Fuentes de poder</a></li>
      </ul>
    </div>
    
  </header>