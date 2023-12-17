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
$usuarios = "SELECT Id, Nombre, Apellido1, Apellido2, Corte, Corte_peinado, Forma, Color, Peinado FROM usuarios ";
    $total_usuarios = $mysqli->query($usuarios);
    $array_usuarios= [];
    while ($usuarioRow = $total_usuarios->fetch_assoc()) {
        $array_usuarios[] = $usuarioRow;
       
    }
    $listado_usuarios = array_slice($array_usuarios, $contador, $fin);
    echo "<thead>";
    echo "<tr>";
    echo "<th scope='col'>#</th>";
    echo  "<th scope='col'>Id</th>";
      echo "<th scope='col'>Nombre</th>";
      echo "<th scope='col'>1º Apellido</th>";
      echo "<th scope='col'>2º Apellido</th>";
      echo "<th scope='col'>Corte</th>";
      echo "<th scope='col'>Corte-peinado</th>";
      echo "<th scope='col'>Forma</th>";
      echo "<th scope='col'>Color</th>";
      echo "<th scope='col'>Peinado</th>";
      echo "<th scope='col'>Borrado</th>";
    echo "</tr>";
    echo "<tbody>";
    foreach($listado_usuarios as $print_usuarios) {
        $contador++;
          $usuarioId = $print_usuarios['Id'];
          $usuarioNombre = $print_usuarios['Nombre'];
          $apellido1 =  $print_usuarios['Apellido1'];
          $apellido2 =  $print_usuarios['Apellido2'];
          $corte = $print_usuarios['Corte'];
          $corte_peinado = $print_usuarios['Corte_peinado'];
          $forma = $print_usuarios['Forma'];          
          $color = $print_usuarios['Color'];
          $peinado = $print_usuarios['Peinado'];

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
          
      }
      echo "</tbody>";
?>
