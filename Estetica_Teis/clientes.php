<?php
require_once("./connection/conexion.php");
$connection = Connection::getInstance();
$mysqli = $connection->getConnection();
$clientes = "SELECT * FROM clientes ";
    $total_clientes = $mysqli->query($clientes);
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
    <div id="listado_clientes">
        <h1>Clientes</h1>
    <table class="table">
  <thead>
    <tr>
    <th scope="col">#</th>
      <th scope="col">Id</th>
      <th scope="col">Nombre</th>
      <th scope="col">1º Apellido</th>
      <th scope="col">2º Apellido</th>
      <th scope="col">Nº Citas</th>
      <th scope="col">Telefono</th>
    </tr>
    <?php 
    echo "<tbody>";
    $contador = 1;
    while ($clientesRow = $total_clientes->fetch_assoc()) {
        if ($contador > 10) {
            break;}
          $clienteId = $clientesRow['Id'];
          $clienteNombre = $clientesRow['Nombre'];
          $cliente_apellido1 =  $clientesRow['Apellido1'];
          $cliente_apellido2 =  $clientesRow['Apellido2'];
          $cliente_citas = $clientesRow['N_citas'];
          $clienteTelefono = $clientesRow['Telefono'];
         

          echo "<tr>";
          echo "<th scope='row'> $contador</th>";
          echo "<td>$clienteId</td>";
          echo "<td>$clienteNombre</td>";
          echo "<td>$cliente_apellido1</td>";
          echo "<td>$cliente_apellido2</td>";
          echo "<td>$cliente_citas</td>";
          echo "<td>$clienteTelefono</td>";
          echo "</tr>";
          $contador++;
      }
      echo "</tbody>";?>
  </thead>
    </table>
    <?php 
    $currentPage =1;
    $clientess = "SELECT * FROM clientes ";
    $total_clientes = $mysqli->query($clientes);
    if($total_clientes->num_rows < 10){

    }else{
    $totalPages =ceil($total_clientes->num_rows / 10);
    echo "<ul class='pagination' id='paginacion'>";
    echo "<li  id= 'previous_clients' class='page-item'><a class='page-link' >Previous</a></li>";
    for ($page = 1; $page <= $totalPages; $page++): ?>
    <li id= "<?php echo $page ?>" class="page-item <?php if($currentPage == $page)echo 'active'?>">
    <a class="page-link selector_clientes"><?php echo $page ?></a>
    <?php endfor;}
    if($total_clientes->num_rows > 10){
       echo "<li id='next_clients' class='page-item'>";
        echo "<a class='page-link' >Next</a>";
    echo "</li>";
    }
    ?>
    
    </ul>
    </div>
  </div>
  <?php require_once("./Estructura/footer.php");?>
</body>
</html>