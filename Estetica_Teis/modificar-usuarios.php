<?php 
require_once("./connection/conexion.php");
$connection = Connection::getInstance();
$mysqli = $connection->getConnection();
$usuarios = "SELECT Id, Nombre, Apellido1, Apellido2 FROM usuarios ";
    $total_usuarios = $mysqli->query($usuarios);
?>
<?php 
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <link rel="shortcut icon" href="./css/imagenes/cara.png">
  <link rel="stylesheet" href="./css/style.css">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Estética Teis</title>
</head>
<body>
  <?php require_once("./Estructura/header.php");
  require_once("./Estructura/modal.php");?>
  <div id="wrapper">
    <div id="modifica_usuarios">
    <h1>Modificar Usuario</h1>
    <form>
    <div class="form-group">
    <label for="exampleFormControlSelect1">Seleccione usuario a modificar</label>
    <select class="form-control" id="select_user">
        <?php
         echo "<option value='$usuarioId'>Seleccione un Usuario</option>";
    while ($usuarioRow = $total_usuarios->fetch_assoc()) {
          $usuarioId = $usuarioRow['Id'];
          $usuarioNombre = $usuarioRow['Nombre'];
          $apellido1 =  $usuarioRow['Apellido1'];
          $apellido2 =  $usuarioRow['Apellido2'];
            echo "<option value='$usuarioId'>" . $usuarioRow['Nombre'] . " " . $usuarioRow['Apellido1'] . " " . $usuarioRow['Apellido2'] ."</option>";
}?>
      
    </select>
    <div class="row">
    
    <div class="col-md-6">
      <label for="nombre">Nombre</label>
      <input type="text" class="form-control" id="nombre" name="nombre" required>
    </div>
    <div class="col-md-6">
      <label for="apellido1">Apellido 1</label>
      <input type="text" class="form-control" id="apellido1" name="apellido1" required>
    </div>
  </div>
  <div class="row">
    
    <div class="col-md-6">
      <label for="apellido2">Apellido 2</label>
      <input type="text" class="form-control" id="apellido2" name="apellido2" required>
    </div>
    <div class="col-md-6">
      <label for="contraseña">Contraseña</label>
      <input type="password" class="form-control" id="contraseña" name="contraseña" required>
    </div>
  </div>
  <div class="row">
    <div class="col-md-6">
      <label for="administrador">Administrador</label>
      <input type="checkbox" class="form-control" id="administrador" name="administrador" value="1">
    </div>
    <div class="col-md-6">
      <label for="numero">Corte</label>
      <input type="number" class="form-control num" id="Corte" name="Corte" value="0" min="0" max="999">
    </div>
    <div class="col-md-6">
      <label for="numero">Corte-peinado</label>
      <input type="number" class="form-control num" id="Corte_peinado" name="Corte_peinado" value="0" min="0" max="999">
    </div>
    <div class="col-md-6">
      <label for="numero">Forma</label>
      <input type="number"  class="form-control num" id="Forma" name="Forma" value="0" min="0" max="999">
    </div>
    <div class="col-md-6">
      <label for="numero">Color</label>
      <input type="number" class="form-control num" id="Color" name="Color" value="0" min="0" max="999">
    </div>
    <div class="col-md-6">
      <label for="numero">Peinado</label>
      <input type="number" class="form-control num" id="Peinado" name="Peinado" value="0" min="0" max="999">
    </div>
  </div>
  </div>
  <button type="submit" class="btn btn-primary" id="modificar_usuario">Guardar</button>
    </form>
    </div>
  </div>
  <?php require_once("./Estructura/footer.php");?>
</body>
</html>