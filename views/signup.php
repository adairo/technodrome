<link rel='stylesheet' href='style/css/global.css'>
<link rel='stylesheet' href='style/css/signup.css'>
<div id='main-div'>
  <h1>Crear cuenta</h1>
  <form method='POST' action='index.php?method=signUp' class='data-form'>
    <label>
      Nombre
      <input type='text' placeholder='Ingresa tu(s) nombre(s)' name='first_name' required>
    </label>

    <label>
      Apellidos
      <input type='text' placeholder='Ingresa tu apellido' name='last_name' required>
    </label>

    <label>
      Dirección de email
      <input type='email' placeholder='Ingresa una dirección de correo válida' name='email' required>
    </label>

    <label>
      Contraseña
      <input type='password' placeholder='Crea una nueva contraseña' name='password' required>
    </label>

    <label>
      Confirmar contraseña
      <input type='password' placeholder='Repite la contraseña' name='cpassword' required>
    </label>
    
    <input class='button-form' type='submit' value='Crear cuenta'>
  </form>

  <p>¿Ya tienes cuenta? <a href="index.php?method=showLogIn">Inicia sesión</a></p>
</div>