<link rel='stylesheet' href='style/css/global.css'>
<!DOCTYPE html>
<html lang="en">
<head>

    <title>TECHNODROME STORE-Pedidos</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/eb496ab1a0.js" crossorigin="anonymous"></script>

</head>
<body>
    <br>

    <?php 
    foreach($pedidos as $p1): ?>
    <div class="container">
        <div class="row" style="background-color: grey; border-radius: 4px; color:white;">
            <div class="col">
                <label for=""> Fecha de Pedido:</label><br>
                <label for=""> <?php 
                                 ?>11 de Noviembre 2021</label><br>

            </div>
            <div class="col">
                <label for=""> Subtotal:</label><br>
                <label for=""> <?php 
                        $precio = intval($p1['precio']);
                        $cantidad = intval($p1['cantidad']);
                        $subtotal = $precio * $cantidad;
                        echo ($subtotal." MXN");
                ?></label>
               
            </div>
            <div class="col" style="text-align: right;">
                <label for=""> No. de Pedido:</label>
                <label for=""> <?php echo $p1['id_pedido'] ?></label>
            </div>
            
        </div>
        <div class="row" style="background-color: white; border-radius: 4px;">
            <div class="col" style="padding-top:5px">
                <img src="resources/products/4/150.png" width="100" height="85"  alt="">
            </div>
            <div class="col">
                <label for=""> Producto: </label>
                <label for=""> Hyper X - Mouse Alambrico RGB </label><br>
                <label for=""> Cantidad: </label>
                <label> <?php echo $p1['cantidad']; ?> </label><br>
            </div>
            <div class="col" style="text-align: center; padding-top: 5px;">
                <div>
                    <a href='Producto.html'><input type="button" value="Ir al producto" style="border-radius: 5px; width: 100%; background-color: #3bb2b8;background: linear-gradient(
                        45deg,
                        rgba(192, 260, 240, 1),
                        rgba(235, 190, 149, 1)
                        );"></a>
                </div>
                <div>
                    <a href='review.html'><input type="button" value="Escribir opinion" style="border-radius: 5px; width: 100%; background-color: #3bb2b8;background: linear-gradient(
                        45deg,
                        rgba(192, 260, 240, 1),
                        rgba(235, 190, 149, 1)
                        );"></a>
                </div>
            </div>
        </div>
    </div>
    <?php endforeach; ?>
    





    <br>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>