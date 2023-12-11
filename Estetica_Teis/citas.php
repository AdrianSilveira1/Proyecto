<?php /* require_once("./connection/conexion.php");
$connection = Connection::getInstance(); */
/* $mysqli = $connection->getConnection();
$consulta = "SELECT * FROM usuarios";
$resultado = $mysqli->query($consulta);

// Procesar el resultado de la consulta
if ($resultado->num_rows > 0) {
  while ($fila = $resultado->fetch_assoc()) {
    echo "ID: " . $fila['Id'] . " - Nombre: " . $fila['Nombre'] . " - Apellidos: " . $fila['Apellido1'] . " " . $fila['Apellido2'] . "<br/>";
  }
} else {
  echo "No se encontraron resultados";
}

// Cerrar la conexión a la base de datos
$mysqli->close(); */
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <link rel="shortcut icon" href="./css/imagenes/belleza3.jpg">
  <link rel="stylesheet" href="./css/style.css">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Estetica Teis</title>
</head>
<body>
  <?php require_once("./Estructura/header.php");?>
  <div id="citas">
    <div class="lista"></div>
  <div class="crea_citas">
    <h2>Cliente</h2>
    <form>
    <div class="form-group">
    <label for="exampleFormControlTextarea1">Nombre del Cliente</label>
    <textarea class="form-control justify-content-center" id="nombre_cliente" rows="1" required></textarea>
  </div>
  <div class="form-group">
    <label for="exampleFormControlTextarea1"> 1º Apellido del Cliente</label>
    <textarea class="form-control" id="1apellido_cliente" rows="1" required></textarea>
  </div>
  <div class="form-group">
    <label for="exampleFormControlTextarea1"> 2º Apellido del Cliente</label>
    <textarea class="form-control" id="2apellido_cliente" rows="1" required></textarea>
  </div>
  <div class="form-group">
    <label for="exampleFormControlSelect1">Servicio</label>
    <select class="form-control" id="servicio">
      <option value="Corte y peinado">Corte y peinado</option>
      <option value="Color">Color</option>
      <option value="Cambio de forma">Cambio de forma</option>
      <option value="Corte">Corte</option>
      <option value="Peinados">Peinados</option>
    </select>
  </div>
  <div class="form-group">
    <label for="exampleFormControlTextarea1">Teléfono del Cliente</label>
    <input type="tel" class="form-control" id="exampleFormControlTextarea1" rows="1" pattern="[0-9]{3}[0-9]{3}[0-9]{3}" required></input>
  </div>
  <button type="submit" class="btn btn-primary">Guardar</button>
</form>
  </div>
  </div>
  <?php require_once("./Estructura/footer.php");?>
</body>
</html>