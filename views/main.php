<link rel='stylesheet' href='style/css/global.css'>
<link rel="stylesheet" href="style/css/main.css">
<main>

<?php if ($status != null) 
  echo "<div class='notification'>$status</div>" 
?>

  

  <!-- Resultados de búsqueda -->
  <?php if (!empty($results)):?>

    <section class='product-section'>

      <h2>Resultados de búsqueda</h2>
      <div class="product-list">
        <?php foreach($results as $product): ?>
          <div class="producto-home">
            <img src=<?php echo 'resources/products/' . $product['id_producto'] . '/150.png'; ?> width="150px" height="150px">
            <div class="description-home">

              <p class='title'><a href='index.php?method=showProduct&id_producto=<?php echo $product['id_producto']?>'>
                <?php echo $product['titulo']?></a></p> <!-- Título del producto -->

              <p class='price'><?php echo '$'.$product['precio']?></p></p> <!-- Precio del producto -->
              <p class='category'>en <a href=""><?php echo $product['categoria']?></p></a></p>
              <div class="description-buttons">
              <a href='index.php?method=showProduct&id_producto=<?php echo $product['id_producto']?>'>
                
              <button class='info'>Ver más</button></a>
              <a href="index.php?method=addToCar&id_producto=<?php echo $product['id_producto'] ?>"><button class='carrito'>Añadir al carrito</button></a>
              </div>
            </div>
          </div>
        <?php endforeach; ?>
      </div>
    </section>
  <?php endif ?>
     
  

  <!-- Últimos agregados -->
  <section class='product-section'>

    <h2>Productos agregados recientemente</h2>
    <div class="product-list">
      <?php foreach($last_added as $product): ?>
        <div class="producto-home">
          <img src=<?php echo 'resources/products/' . $product['id_producto'] . '/150.png'; ?> width="150px" height="150px">
          <div class="description-home">

            <p class='title'><a href='index.php?method=showProduct&id_producto=<?php echo $product['id_producto']?>'>
              <?php echo $product['titulo']?></a></p> <!-- Título del producto -->

            <p class='price'><?php echo '$'.$product['precio']?></p></p> <!-- Precio del producto -->
            <p class='category'>en <a href=""><?php echo $product['categoria']?></p></a></p>
            <div class="description-buttons">
              <a href='index.php?method=showProduct&id_producto=<?php echo $product['id_producto']?>'>
                
              <button class='info'>Ver más</button></a>
              <a href="index.php?method=addToCar&id_producto=<?php echo $product['id_producto'] ?>"><button class='carrito'>Añadir al carrito</button></a>
            </div>
          </div>
        </div>
      <?php endforeach; ?>
    </div>
  </section>

  <!-- Todos los productos -->
  <section class='product-section'>

    <h2>Todos los productos</h2>
    <div class="product-list all-products">
      <?php foreach($all_products as $product): ?>
        <div class="producto-home">
          <img src=<?php echo 'resources/products/' . $product['id_producto'] . '/150.png'; ?> width="150px" height="150px">
          <div class="description-home">

            <p class='title'><a href='index.php?method=showProduct&id_producto=<?php echo $product['id_producto']?>'>
              <?php echo $product['titulo']?></a></p> <!-- Título del producto -->

            <p class='price'><?php echo '$'.$product['precio']?></p></p> <!-- Precio del producto -->
            <p class='category'>en <a href=""><?php echo $product['categoria']?></p></a></p>
            <div class="description-buttons">
              <a href='index.php?method=showProduct&id_producto=<?php echo $product['id_producto']?>'>
                
              <button class='info'>Ver más</button></a>
              <a href="index.php?method=addToCar&id_producto=<?php echo $product['id_producto'] ?>"><button class='carrito'>Añadir al carrito</button></a>
            </div>
          </div>
        </div>
      <?php endforeach; ?>
    </div>
  </section>
</main>

