<?php 
?>
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
  require_once("./Estructura/modal.php");
 
  ?>
  <div id="wrapper">
    
    <div id="crea_usuarios">
        <h1>Crear Usuario</h1>
    <form>
  <div class="row">
    <div class="col-md-6">
      <label for="id">ID</label>
      <input type="text" class="form-control" id="id" name="id" required>
    </div>
    <div class="col-md-6">
      <label for="nombre">Nombre</label>
      <input type="text" class="form-control" id="nombre" name="nombre" required>
    </div>
  </div>
  <div class="row">
    <div class="col-md-6">
      <label for="apellido1">Apellido 1</label>
      <input type="text" class="form-control" id="apellido1" name="apellido1" required>
    </div>
    <div class="col-md-6">
      <label for="apellido2">Apellido 2</label>
      <input type="text" class="form-control" id="apellido2" name="apellido2" required>
    </div>
  </div>
  <div class="row">
    <div class="col-md-6">
      <label for="contraseña">Contraseña</label>
      <input type="password" class="form-control" id="contraseña" name="contraseña" required>
    </div>
    <div class="col-md-6">
      <label for="administrador">Administrador</label>
      <input type="checkbox" class="form-control" id="administrador" name="administrador" value="1">
    </div>
  </div>
  <button type="submit" class="btn btn-primary" id="guardar_usuario">Guardar</button>
</form>
    </div>
  </div>
  <?php require_once("./Estructura/footer.php");?>
  
</body>
<script src="../js/draggable.js"></script>
</html>
<script>
  $(function() {
    var $draggable = $('.modal');
    $draggable.draggable({
      handle: $('.modal-header, .modal-footer', $draggable),
    })
  });
  </script>