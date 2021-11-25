<link rel="stylesheet" href="style/css/global.css">
<link rel="stylesheet" href="style/css/carrito.css">
<div id="main-div">

  <div id="product-list">

    <?php foreach ($products as $prod):?>
      <div class="product">
        <img src="resources/products/500.png" alt="" width="300px" height="300px">
        <div class="product-info">
          <div class="product-description">
            <h2><?php echo $prod['titulo']?></h2>
            <p><?php echo '$'.$prod['precio']?></p>
          </div>
          <div class="product-controls">
            <button class='delete'>Eliminar</button>
            <button>-</button>
            <input type="text" value='<?php echo $prod['cantidad']; ?>'>
            <button>+</button>
          </div>
        </div>
      </div>
    <?php endforeach; ?>

  </div>
</div>

<div style="width:199%" class="metpago">
  <a href="index.php?method=showMetodoPago"><button class="botonpago">Continuar al Metodo de Pago</button></a>

</div>