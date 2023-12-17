<?php  require_once("./connection/conexion.php");
 $connection = Connection::getInstance();
 $mysqli = $connection->getConnection();
/*
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
  <?php require_once("./Estructura/header.php"); 
 
  
  if(!isset($_SESSION['administrador'])){
  header("Location: ./Inicio.php");
}?>
  <div id="citas">
    <div class="lista">
       <h1>Citas</h1>
      <div id="lista_citas">
        <?php
        echo "<ul class='list-group list-group-flush'>";
         $appointmentsQuery = "SELECT c.Id, c.Fecha, c.Cliente, u.Nombre AS Nombre, u.Apellido1 AS Apellido1, u.Apellido2 AS Apellido2, 
         c.Servicio, c2.Nombre AS NombreC, c2.Apellido1 AS Apellido1C, c2.Apellido2 AS Apellido2C,
         c2.Telefono AS Telefono FROM citas c JOIN usuarios u ON c.Agendador = u.Id JOIN clientes c2 ON c.Cliente= c2.Id WHERE c.Fecha >= CURDATE() ORDER BY c.Fecha ASC ";
         $appointmentsResult = $mysqli->query($appointmentsQuery);
         if ($appointmentsResult->num_rows > 0) {
          $count = 0;
          
          while ($appointmentRow = $appointmentsResult->fetch_assoc()) {
            if ($count >= 5) {
              break;
          }
              $appointmentId = $appointmentRow['Id'];
              $appointmentDate = $appointmentRow['Fecha'];
              $agendador = $appointmentRow['Nombre'] . " " . $appointmentRow['Apellido1'] . " " . $appointmentRow['Apellido2'];
              $cliente = $appointmentRow['NombreC'] . " " . $appointmentRow['Apellido1C'] . " " . $appointmentRow['Apellido2C'];
              $servicio = $appointmentRow['Servicio'];
              $telefonoQuery = $appointmentRow['Telefono'];

              echo "<li class='list-group-item'>";
              echo "Id Cita: $appointmentId\n";
              echo "Fecha: $appointmentDate\n";
              echo "Agendador: $agendador\n";
              echo "Cliente: $cliente\n";
              echo "Servicio: $servicio\n";
              echo "Telefono: $telefonoQuery\n";
              echo "</li>";
              $count++;
          }
        
      }
      echo "</ul>";
        ?>
      </div>
   
    <ul class="pagination" id="appointments">
    <li id="previous" class="page-item disabled">
  <a class="page-link" >Previous</a>
</li>
        <?php
            // Connect to the database
           
            // Get the current date
            $currentDate = new DateTime();
            $currentPage = 1;
             // Retrieve the appointments
            $appointmentsQuery = "SELECT c.Id, c.Fecha, c.Cliente, u.Nombre AS Nombre, u.Apellido1 AS Apellido1, u.Apellido2 AS Apellido2, 
            c.Servicio, c2.Nombre AS NombreC, c2.Apellido1 AS Apellido1C, c2.Apellido2 AS Apellido2C,
            c2.Telefono AS Telefono FROM citas c JOIN usuarios u ON c.Agendador = u.Id JOIN clientes c2 ON c.Cliente= c2.Id WHERE c.Fecha >= CURDATE() ORDER BY c.Fecha ASC ";
            $appointmentsResult = $mysqli->query($appointmentsQuery);
           
            $totalPages =ceil($appointmentsResult->num_rows / 5);
            for ($page = 1; $page <= $totalPages; $page++): ?>
            <li id= "<?php echo $page ?>" class="page-item <?php if($currentPage == $page)echo 'active' ?> ">
            <a class="page-link selector_citas" ><?php echo $page ?> </a>
</li>
<?php endfor;
        ?>
        
<li id="next" class="page-item ">
  <a  class="page-link" >Next</a>
</li>
    </ul>
    </div>
    <div class="crea_citas">
      <h2>Cliente</h2>
      <form id="formulario">
        <div class="form-group">
          <label for="nombre_cliente">Nombre del Cliente</label>
          <input type="text" class="form-control justify-content-center" name="nombre_cliente" id="nombre_cliente"  required></input>
        </div>
        <div class="form-group">
          <label for="apellidocliente1"> 1º Apellido del Cliente</label>
          <input type="text" class="form-control" name="apellidocliente1" id="apellidocliente1" required></input>
        </div>
        <div class="form-group">
          <label for="apellido_cliente2"> 2º Apellido del Cliente</label>
          <input type="text" class="form-control" name="apellidocliente2" id="apellidocliente2" required></input>
        </div>
        <div class="form-group">
          <label for="servicio">Servicio</label>
          <select class="form-control" name="servicio" id="servicio">
            <option value="Corte-peinado">Corte y peinado</option>
            <option value="Color">Color</option>
            <option value="Cambio de forma">Cambio de forma</option>
            <option value="Corte">Corte</option>
            <option value="Peinados">Peinados</option>
          </select>
        </div>
        <div class="form-group">
          <label for="telefono">Teléfono del Cliente</label>
          <input type="tel" class="form-control" name="telefono" id="telefono" rows="1" pattern="[0-9]{3}[0-9]{3}[0-9]{3}" maxlength="9" required></input>
        </div>
        <div class="form-group">
          <label for="fecha">Fecha de Cita</label>
          <input type="date" class="form-control" name="fecha" id="fecha" required></input>
        </div>
        <button type="submit" class="btn btn-primary" id="guardar_cita">Guardar</button>
      </form>
    </div>
  </div>
  <?php require_once("./Estructura/footer.php"); ?>
  
</body>

</html>