<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Iniciar Sesion</title>
  <link rel="icon" href="img/icons_document/InvesTra.png">
  <link rel="stylesheet" href="css/login.css">
</head>

<body>
  <form action="views/principal.php" method="post">
    <div class="screen-1">
      <div class="logo">
        <img src="img/icons_document/InvesTra.png" alt="">
      </div>
      <div class="titleform">
        <span>Inves<span class="twoTextLogo">Tra</span></span>
      </div>
      <div class="input-card">
        <label class="txt_input">Usuario</label>
        <div class="sec-2">
          <img src="img/user.png" alt="" width="19px">
          <input type="text" name="user" placeholder="Username" required />
        </div>
      </div>
      <div class="input-card">
        <label class="txt_input">Contraseña</label>
        <div class="sec-2">
          <img src="img/passKey.png" alt="" width="19px">
          <input class="pas" type="password" name="password" placeholder="············" required />
        </div>
      </div>
      <div class="forgotpass">
        <a href="#">¿Olvidaste tu contraseña?</a>
      </div>
      <input type="submit" class="login register" value="Ingresar">
      <div class="newaccount">
        <span>¿No tienes una cuenta?</span>
      </div>
      <a href="#" class="login newregister">Registrarse</a>
    </div>
  </form>
</body>

</html>