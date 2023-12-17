<?php
if(isset($_POST['page'])){
    $page = $_POST['page'];
    }else{
    $page = null;
    }
    $fin = 10;
    
    if($page == 1){
        $contador = 0;
        }else{
            $contador = (10 * $page) -10;
        }
require_once("../connection/conexion.php");
$connection = Connection::getInstance();
$mysqli = $connection->getConnection();
$appointmentsQuery = "SELECT c.Id, c.Fecha, c.Cliente, u.Nombre AS Nombre, u.Apellido1 AS Apellido1, u.Apellido2 AS Apellido2, 
         c.Servicio, c2.Nombre AS NombreC, c2.Apellido1 AS Apellido1C, c2.Apellido2 AS Apellido2C,
         c2.Telefono AS Telefono FROM citas c JOIN usuarios u ON c.Agendador = u.Id JOIN clientes c2 ON c.Cliente= c2.Id WHERE c.Fecha >= CURDATE() ORDER BY c.Fecha ASC ";
         $appointmentsResult = $mysqli->query($appointmentsQuery);
    $array_citas= [];
    while ($citaRow = $appointmentsResult->fetch_assoc()) {
        $array_citas[] = $citaRow;
       
    }
    $listado_citas = array_slice($array_citas, $contador, $fin);
    echo "<thead>";
    echo "<tr>";
    echo "<th scope='col'>#</th>";
    echo  "<th scope='col'>Id</th>";
      echo "<th scope='col'>Fecha</th>";
      echo "<th scope='col'>Agendador</th>";
      echo "<th scope='col'>Cliente</th>";
      echo "<th scope='col'>Servicio</th>";
      echo "<th scope='col'>Telefono</th>";
    echo "</tr>";
    echo "<tbody>";
    foreach($listado_citas as $print_citas) {
        $contador++;
          $citaId = $print_citas['Id'];
          $citaFecha = $print_citas['Fecha'];
          $citaAgendador = $print_citas['Nombre'] . " " . $print_citas['Apellido1'] . " " . $print_citas['Apellido2'];
        $citaCliente = $print_citas['NombreC'] . " " . $print_citas['Apellido1C'] . " " . $print_citas['Apellido2C'];
          $citaServicio = $print_citas['Servicio'];
          $citaTelefono = $print_citas['Telefono'];

          echo "<tr>";
          echo "<th scope='row'> $contador</th>";
          echo "<td>$citaId</td>";
          echo "<td>$citaFecha</td>";
          echo "<td>$citaAgendador</td>";
          echo "<td>$citaCliente</td>";
          echo "<td>$citaServicio</td>";
          echo "<td>$citaTelefono</td>";
          echo "</tr>";
          
      }
      echo "</tbody>";
?>