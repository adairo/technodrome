<link rel='stylesheet' href='style/css/global.css'>
<link rel="stylesheet" href="style/css/product.css">
<div id="main-div">
    <div class="product-about">
      <img src='resources/products/<?php echo $product['id_producto']?>/500.png' alt="">
      <div class="product-info">
        <h1><?php echo $product['titulo']?></h1>
        <a href=""><?php echo $product['categoria']?></a>
        <p class='precio'><?php echo '$' . $product['precio']?></p>
        <div class="product-description">
          <?php include("resources/products/" . $product['id_producto'] . "/description.html"); ?>
        </div>
        <a href="index.php?method=addToCar&id_producto=<?php echo $product['id_producto'] ?>"><button>Agregar al carrito</button></a>
      </div>
    </div>
</div>