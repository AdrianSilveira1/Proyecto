<?php ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <link rel="shortcut icon" href="./css/imagenes/cara.png">
  <link rel="stylesheet" href="./css/style.css">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Estetica Teis</title>
</head>
<body>
  <?php require_once("./Estructura/header.php");
  require_once("./Estructura/modal.php");?>
  <div id="wrapper">
    <div id="login">
    <form id="div-login">
  <div class="form-group">
    <label for="usuario">Usuario</label>
    <input type="text" class="form-control" id="usuario" name="usuario" placeholder="Introduzca su usuario" required>
  </div>
  <div class="form-group espaciado">
    <label for="contraseña">Contraseña</label>
    <input type="password" class="form-control" id="contraseña" name="contraseña" placeholder="Introduzca su Contraseña" required>
  </div>
  
  <button type="submit" id="logearse" class="btn btn-primary">Acceder</button>
</form>
    </div>
  </div>
  <?php require_once("./Estructura/footer.php");?>
</body>
</html>