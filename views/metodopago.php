<link rel='stylesheet' href='style/css/global.css'>
<link rel='stylesheet' href='style/css/signup.css'>
<div id='main-div'>
  <h1>Método de Pago</h1>
  <form method='post' class='data-form'>
    <label>
      Nombre del Titular
      <input type='text' placeholder='Ingresa tu(s) nombre(s) y apellido(s)'>
    </label>

    <label>
      Número de Tarjeta a 18 digitos
      <input type='number' placeholder='Ingresa el numero de tarjeta'>
    </label>

    <label>
      Código de Seguridad de la Tarjeta
      <input type='password' placeholder='Ingrese codigo de seguridad'>
    </label>

    <label>
      Año de Vencimiento
      <input type='date' placeholder='Ingrese fecha de vencimiento'>
    </label>

    <input class='button-form' type='submit' value='CONFIRMAR PAGO'>

  </form>

  <p>¿Se te olvidó algo?<a href="index.php?method=showShoppingCar">Regresa al Carrito</a></p>
</div>
