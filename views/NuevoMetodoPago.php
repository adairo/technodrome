<link rel='stylesheet' href='style/css/global.css'>
<link rel='stylesheet' href='style/css/signup.css'>
<div id='main-div'>
  <h1>Nuevo Método de Pago</h1>
  <form method='post' class='data-form'>
    <label>
      Nombre del Titular
      <input type='text' placeholder='Ingresa tu(s) nombre(s) y apellido(s)'>
    </label>

    <label>
      Número de Tarjeta a 18 digitos
      <input type='text' maxlength="18" placeholder='Ingresa el numero de tarjeta'>
    </label>

    <label>
      Código de Seguridad de la Tarjeta
      <input type='password' placeholder='Ingrese codigo de seguridad'>
    </label>

    <label>
      Año de Vencimiento
      <input type='month' placeholder='Ingrese fecha de vencimiento'>
    </label>

    <input class='button-form' type='submit' value='CONFIRMAR METODO DE PAGO'>

  </form>

  <p>¿Este no es el sitio que buscabas?<a href="index.php?method=showMetodoPago"> Regresa al Metodo de Pago Existente</a></p>
</div>