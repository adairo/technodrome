<link rel='stylesheet' href='style/css/global.css'>
<link rel='stylesheet' href='style/css/signup.css'>

<div id='main-div'>
  <h1>Iniciar sesión</h1>

  <form class='data-form' method='POST' action='index.php?method=logIn'>
   
    <label for='email-input'>
      Dirección de email
      <input type='email' autocomplete required name='email' id='email-input'>
    </label>

    <label for='password-input'>
      Contraseña
      <input type='password' required name='password' id='password-input'>
    </label>

    <input class='button-form' type='submit' value='Iniciar sesión' >

  </form>

  <p>¿No tienes cuenta? <a href="index.php?method=showSignUp">Regístrate</a></p>
</div>
