<link rel='stylesheet' href='style/css/global.css'>
<link rel='stylesheet' href='style/css/signup.css'>
<div id='main-div'>
  <h1>Nuevo Método de Pago</h1>
  <form method='post' action='index.php?method=NewMetodoPago' class='data-form'>
    <label>
      Nombre del Titular
      <input type='text' name="nombreyapellido" placeholder='Ingresa tu(s) nombre(s) y apellido(s)'>
    </label>

    <label>
      Número de Tarjeta a 16 digitos
      <input type='text' name="numerotarjeta" maxlength="16" placeholder='Ingresa el numero de tarjeta'>
    </label>

    <label>
      Código de Seguridad de la Tarjeta
      <input type='password' maxlength="3" placeholder='Ingrese codigo de seguridad'>
    </label>

    <label>
      Año de Vencimiento
      <input type='month' placeholder='Ingrese fecha de vencimiento'>
    </label>

    <input class='button-form' type='submit' value='CONFIRMAR METODO DE PAGO'>

  </form>

  <p>¿Este no es el sitio que buscabas?<a href="index.php?method=showMetodoPago"> Regresa al Metodo de Pago Existente</a></p>
</div>