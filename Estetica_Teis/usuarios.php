<?php
require_once("./connection/conexion.php");
$connection = Connection::getInstance();
$mysqli = $connection->getConnection();
$usuarios = "SELECT Id, Nombre, Apellido1, Apellido2, Corte, Corte_peinado, Forma, Color, Peinado FROM usuarios ";
    $total_usuarios = $mysqli->query($usuarios);
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
    <div id="listado_usuarios">
        <h1>Usuarios</h1>
    <table class="table">
  <thead>
    <tr>
    <th scope="col">#</th>
      <th scope="col">Id</th>
      <th scope="col">Nombre</th>
      <th scope="col">1º Apellido</th>
      <th scope="col">2º Apellido</th>
      <th scope="col">Corte</th>
      <th scope="col">Corte-peinado</th>
      <th scope="col">Forma</th>
      <th scope="col">Color</th>
      <th scope="col">Peinado</th>
      <th scope="col">Borrado</th>
    </tr>
    <?php 
    echo "<tbody>";
    $contador = 1;
    while ($usuarioRow = $total_usuarios->fetch_assoc()) {
        if ($contador > 10) {
            break;}
          $usuarioId = $usuarioRow['Id'];
          $usuarioNombre = $usuarioRow['Nombre'];
          $apellido1 =  $usuarioRow['Apellido1'];
          $apellido2 =  $usuarioRow['Apellido2'];
          $corte = $usuarioRow['Corte'];
          $corte_peinado = $usuarioRow['Corte_peinado'];
          $forma = $usuarioRow['Forma'];          
          $color = $usuarioRow['Color'];
          $peinado = $usuarioRow['Peinado'];

          echo "<tr>";
          echo "<th scope='row'> $contador</th>";
          echo "<td>$usuarioId</td>";
          echo "<td>$usuarioNombre</td>";
          echo "<td>$apellido1</td>";
          echo "<td>$apellido2</td>";
          echo "<td>$corte</td>";
          echo "<td>$corte_peinado</td>";
          echo "<td>$forma</td>";
          echo "<td>$color</td>";
          echo "<td>$peinado</td>";
          echo "<td><button type='submit' class='btn btn-danger eliminar_usuario' id='$usuarioId'>Borrar</button></td>";
          echo "</tr>";
          $contador++;
      }
      echo "</tbody>";?>
  </thead>
    </table>
    <?php 
    $currentPage =1;
    $usuarios = "SELECT * FROM usuarios ";
    $total_usuarios = $mysqli->query($usuarios);
    if($total_usuarios->num_rows < 10){

    }else{
    $totalPages =ceil($total_usuarios->num_rows / 10);
    echo "<ul class='pagination' id='paginacion'>";
    echo "<li  id= 'previous_users' class='page-item'><a class='page-link' >Previous</a></li>";
    for ($page = 1; $page <= $totalPages; $page++): ?>
    <li id= "<?php echo $page ?>" class="page-item <?php if($currentPage == $page)echo 'active'?>">
    <a class="page-link selector_usuarios"><?php echo $page ?></a>
    <li id="next_users"class="page-item">
        <a class="page-link" >Next</a>
    </li>
    <?php endfor;}?>
    
    
    </ul>
    </div>
  </div>
  <?php require_once("./Estructura/footer.php");?>
</body>
</html>