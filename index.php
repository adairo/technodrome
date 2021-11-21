<!DOCTYPE html>
<html lang="es-MX">
  <head>
    <title>TECHNODROME STORE</title>
    
    <link rel="shortcut icon" href="logo1.jpg">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Caompatible" content="ie=edge">
    

    <!-- main css-->
    <link rel="stylesheet" href="style/css/main.css">

    

    <!--Iconos de Footer -->
    <script src="https://kit.fontawesome.com/eb496ab1a0.js" crossorigin="anonymous"></script>
    
  </head>
  <header>

    <!-- Barra Busqueda -->
    <div class='header-top'>
      <p>Technodrome</p>
      
      <form id='search-field'>
        <input type="text" class='search-bar' placeholder="Buscar en la página">
        <input type="submit" value='Buscar'>
      </form>

      <div class="user-actions">
        <ul>
          <li><a href="#">Iniciar sesión</a></li>
          <li><a href="#">Mis pedidos</a></li>
          <li><a href="#">Carrito</a></li>
        </ul>
      </div> 
    </div>

    <div class="header-bottom">
      <ul>
        <li><a href="">Inicio</a></li>

        <li><a href="">PC</a></li>
        <li><a href="">Componentes</a></li>
      </ul>
    </div>
    
  </header>
  


  <body>
  <?php 
    include('bd/connection.php');
    include('modelo/ProductoModel.php');

    $pm = new ProductoModel();
    $data = $pm->getLastAdded();
  ?>
  <main>

    <div class="title-section">
          <h2>Productos agregados recientemente</h2>
    </div>
    <!-- Cuadros de Productos -->
    <section class='product-section'>
      <?php 
      foreach($data as $product): ?>
        <div class="producto-home">
          <img src=<?php echo './resources/products/' . $product['id_producto'] . '/150.png'; ?> width="150px" height="150px">
          <div class="description-home">
            <p class='title'><?php echo $product['titulo']?></p> <!-- Título del producto -->
            <p class='price'><?php echo '$'.$product['precio']?></p></p> <!-- Precio del producto -->
            <p class='category'>en <a href=""><?php echo $product['categoria']?></p></a></p>
            <div class="description-buttons">
              <button class='info'>Ver más</button>
              <button class='carrito'>Añadir al carrito</button>
            </div>
          </div>
        </div>
      <?php endforeach; ?>
    </section>

  </main>

    
    <!-- Footer Informacion -->

    <footer class="pie-pagina">
      <div class="grupo-1">
        <div class="box">
          <figure>
            <a href="#">
              <img src="logo1.jpg" alt="Logo de Technodrome Store">
            </a>
          </figure>
        </div>
        <div class="box">
          <h2>SOBRE NOSOTROS</h2>
          <p>Technodrome Store es una tienda online especializada en la venta de computadores, componentes y accesorios
            para PC la cual fue creada a base de un proyecto escolar</p>
          <p>Contamos con la participacion de 5 integrantes de equipo</p>
        </div>
        <div class="box">
          <h2>SÍGUENOS</h2>
          <div class="red-social">
            <a href="#" class="fa fa-facebook"></a>
            <a href="#" class="fa fa-instagram"></a>
            <a href="#" class="fa fa-twitter"></a>
            <a href="#" class="fa fa-youtube"></a>
          </div>
        </div>
      </div>
      <div class="grupo-2">
        <small>&copy; 2021 <b>Technodrome Store</b> - Todos los Derechos Reservados.</small>
      </div>
    </footer>
  </body>
</html>