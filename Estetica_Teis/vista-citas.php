<?php 
require_once("./connection/conexion.php");
$connection = Connection::getInstance();
$mysqli = $connection->getConnection();
$appointmentsQuery = "SELECT c.Id, c.Fecha, c.Cliente, u.Nombre AS Nombre, u.Apellido1 AS Apellido1, u.Apellido2 AS Apellido2, 
         c.Servicio, c2.Nombre AS NombreC, c2.Apellido1 AS Apellido1C, c2.Apellido2 AS Apellido2C,
         c2.Telefono AS Telefono FROM citas c JOIN usuarios u ON c.Agendador = u.Id JOIN clientes c2 ON c.Cliente= c2.Id WHERE c.Fecha >= CURDATE() ORDER BY c.Fecha ASC ";
         $appointmentsResult = $mysqli->query($appointmentsQuery);
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
    <div id="vista_citas">
    <h1>Citas</h1>
    <table class="table">
  <thead>
    <tr>
    <th scope="col">#</th>
      <th scope="col">Id</th>
      <th scope="col">Fecha</th>
      <th scope="col">Agendador</th>
      <th scope="col">Cliente</th>
      <th scope="col">Servicio</th>
      <th scope="col">Telefono</th>
      <th scope="col">Borrado</th>
    </tr>
    <?php 
    echo "<tbody>";
    $contador = 1;
    while ($citasRow = $appointmentsResult->fetch_assoc()) {
        if ($contador > 10) {
            break;}
          $citaId = $citasRow['Id'];
          $citaFecha = $citasRow['Fecha'];
          $citaAgendador =  $citasRow['Nombre'] . " " . $citasRow['Apellido1'] . " " . $citasRow['Apellido2'];
          $citaCliente = $citasRow['NombreC'] . " " . $citasRow['Apellido1C'] . " " . $citasRow['Apellido2C'];
          $citaServicio = $citasRow['Servicio'];
          $citaTelefono = $citasRow['Telefono'];

          echo "<tr>";
          echo "<th scope='row'> $contador</th>";
          echo "<td>$citaId</td>";
          echo "<td>$citaFecha</td>";
          echo "<td>$citaAgendador</td>";
          echo "<td>$citaCliente</td>";
          echo "<td>$citaServicio</td>";
          echo "<td>$citaTelefono</td>";
          echo "<td><button type='submit' class='btn btn-danger eliminar_cita' id='$citaId'>Borrar</button></td>";
          echo "</tr>";
          $contador++;
      }
      echo "</tbody>";?>
  </thead>
    </table>
    

</script>
    <?php 
    $currentPage =1;
    $usuarios = "SELECT * FROM usuarios ";
    $total_usuarios = $mysqli->query($usuarios);
    if($appointmentsResult->num_rows < 10){

    }else{
    $totalPages =ceil($appointmentsResult->num_rows / 10);
    echo "<ul class='pagination' id='paginacion'>";
    echo "<li  id= 'previous_citas' class='page-item'><a class='page-link' >Previous</a></li>";
    for ($page = 1; $page <= $totalPages; $page++): ?>
    <li id= "<?php echo $page ?>" class="page-item <?php if($currentPage == $page)echo 'active'?>">
    <a class="page-link selector_citas"><?php echo $page ?></a>
    
    <?php endfor;}?>
    <li id="next_citas"class="page-item">
        <a class="page-link" >Next</a>
    </li>
    
    </ul>
  </div>
</div>
  <?php require_once("./Estructura/footer.php");?>
</body>
</html>