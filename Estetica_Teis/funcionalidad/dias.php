<?php
require_once("../connection/conexion.php");
if(isset($_POST['page'])){
$page = $_POST['page'];
}else{
$page = null;
}
$contador = 0;
 
$connection = Connection::getInstance();
$mysqli = $connection->getConnection();

$appointmentsQuery = "SELECT c.Id, c.Fecha, c.Cliente, u.Nombre AS Nombre, u.Apellido1 AS Apellido1, u.Apellido2 AS Apellido2,
            c.Servicio, c2.Nombre AS NombreC, c2.Apellido1 AS Apellido1C, c2.Apellido2 AS Apellido2C,
            c2.Telefono AS Telefono FROM citas c JOIN usuarios u ON c.Agendador = u.Id JOIN clientes c2 ON c.Cliente= c2.Id
            WHERE c.Fecha >= CURDATE() ORDER BY c.Fecha ASC";

$appointmentsResult = $mysqli->query($appointmentsQuery);
$appointmentsData = [];

while ($appointmentRow = $appointmentsResult->fetch_assoc()) {
    $appointmentsData[] = $appointmentRow;
   
}

//$row_citas= mysqli_fetch_assoc($resultado6);
// Process the appointments in groups of 5

if($page == 1){
$contador = 0;
}else{
    $contador = (5 * $page) -5;
}
$fin = 5;
if ($contador> count($appointmentsData)) {
    $fin = count($appointmentsData);
  }
$citas = array_slice($appointmentsData, $contador, $fin);
foreach ($citas as $cita) {
    $appointmentId = $cita['Id'];
    $appointmentDate = $cita['Fecha'];
    $agendador = $cita['Nombre'] . " " . $cita['Apellido1'] . " " . $cita['Apellido2'];
    $cliente = $cita['NombreC'] . " " . $cita['Apellido1C'] . " " . $cita['Apellido2C'];
    $servicio = $cita['Servicio'];
    $telefonoQuery = $cita['Telefono'];
  
    echo "<li class='list-group-item'>";
    echo "Id Cita: $appointmentId\n";
    echo "Fecha: $appointmentDate\n";
    echo "Agendador: $agendador\n";
    echo "Cliente: $cliente\n";
    echo "Servicio: $servicio\n";
    echo "Telefono: $telefonoQuery\n";
    echo "</li>";
  }
    
 
?>