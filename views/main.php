<link rel='stylesheet' href='style/css/global.css'>
<link rel="stylesheet" href="style/css/main.css">
<main>

  <div class="title-section">
        <h2>Productos agregados recientemente</h2>
  </div>
  <!-- Cuadros de Productos -->
  <section class='product-section'>
    <?php 
    foreach($last_added as $product): ?>
      <div class="producto-home">
        <img src=<?php echo 'resources/products/' . $product['id_producto'] . '/150.png'; ?> width="150px" height="150px">
        <div class="description-home">

          <p class='title'><a href='index.php?method=showProduct&id_producto=<?php echo $product['id_producto']?>'>
            <?php echo $product['titulo']?></a></p> <!-- Título del producto -->

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

