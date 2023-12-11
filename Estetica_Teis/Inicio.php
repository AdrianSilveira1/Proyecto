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
  <link rel="shortcut icon" href="./css/imagenes/cara.png">
  <link rel="stylesheet" href="./css/style.css">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Estetica Teis</title>
</head>
<body>
  <?php require_once("./Estructura/header.php");?>
  <div id="wrapper">
    <div id="inicio">
      <h2 >Bienvenido a Estética Teis</h2>
</br>
      <p>
        Con esta aplicación tienes a tu disposición, un gestor de citas para servicios de belleza sencillo pero altamente eficiente.</br> </br>
        Estética teis satisface tu necesidad de creación, modificación y eliminación de usuarios para que tu plantilla no deje de crecer.</br></br>
        Que necesitas una manera de ver tu calendario de citas de forma clara y concisa? En nuestro apartado de calendario encontrarás lo que buscas.</br></br>
        Con la función clientes podrás ver los datos de los clientes que solicitan tus servicios, perfecta por si necesitas comunicarte con ellos o si prefieres hacer un seguimiento de nuevos clientes.</br></br>
        Si necesitas saber que servicios han realizado tus empleados con Estética Teis no tendrás problema.
      </p>
    </div>
  </div>
  <?php require_once("./Estructura/footer.php");?>
</body>
</html>