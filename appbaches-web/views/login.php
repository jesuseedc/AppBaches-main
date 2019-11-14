<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar sesion en AppBaches Web Client</title>
    <link rel="stylesheet" href="login.css">
</head>

<body>
    <form action="" method="POST">
        <h2>Iniciar sesión</h2>
          <input type="text" placeholder="&#128272; Usuario" name="username">
          <input type="password" placeholder="&#128272; Contraseña" name="password">
          <?php
              if(isset($errorLogin)){
                  echo $errorLogin;
              }
          ?>
          <input type="submit" value="Ingresar">
    </form>
</body>
</html>
