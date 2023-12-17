<?php 
require_once("../connection/conexion.php");
$connection = Connection::getInstance();
$mysqli = $connection->getConnection();
if (isset($_POST["id"])) {
    $id = $_POST["id"];
 } else {
    $id = null;
 }
 $usuarios_lista = "SELECT Id, Nombre, Apellido1, Apellido2 FROM usuarios ";
    $total_usuarios = $mysqli->query($usuarios_lista);
 $usuarios = "SELECT Nombre, Apellido1, Apellido2,Contraseña, Administrador, Corte, Corte_peinado, Forma, Color, Peinado FROM usuarios WHERE Id = ?";
 $listar = $mysqli->prepare($usuarios);
 $listar->bind_param("s",$id );
 $listar->execute();
    $listarX = $listar->get_result();
    echo "<div class='col-md-6' style='visibility: hidden;display: none'>";
         
          echo "<input type='text' class='form-control' id='id' value='$id' name='id' required>";
        echo "</div>";
    while ($usuarioRow = $listarX->fetch_assoc()) {
        if($usuarioRow['Administrador'] == 1){
            $check = "checked";
        }else{
            $check = "";
        }
        echo "<div class='form-group'>";
    echo "<label for='exampleFormControlSelect1'>Seleccione usuario a modificar</label>";
    echo "<select class='form-control' id='select_user'>";
        
    echo "<option >Seleccione un usuario</option>";
    while ($usuarioRows = $total_usuarios->fetch_assoc()) {
          $usuarioId = $usuarioRows['Id'];
          $usuarioNombre = $usuarioRows['Nombre'];
          $apellido1 =  $usuarioRows['Apellido1'];
          $apellido2 =  $usuarioRows['Apellido2'];
            echo "<option value='$usuarioId'>" . $usuarioRows['Nombre'] . " " . $usuarioRows['Apellido1'] . " " . $usuarioRows['Apellido2'] ."</option>";
}
        echo "</select>";
        echo "<div class='row'>";
    
        echo "<div class='col-md-6'>";
         echo  "<label for='nombre'>Nombre</label>";
          echo "<input type='text' class='form-control' id='nombre' value='{$usuarioRow['Nombre']}' name='nombre' required>";
        echo "</div>";
        echo "<div class='col-md-6'>";
          echo "<label for='apellido1'>Apellido 1</label>";
          echo "<input type='text' class='form-control' id='apellido1' value='{$usuarioRow['Apellido1']}' name='apellido1' required>";
        echo "</div>";
      echo "</div>";
      echo "<div class='row'>";
        
        echo "<div class='col-md-6'>";
          echo "<label for='apellido2'>Apellido 2</label>";
          echo "<input type='text' class='form-control' id='apellido2' value='{$usuarioRow['Apellido2']}' name='apellido2' required>";
        echo "</div>";
        echo "<div class='col-md-6'>";
          echo "<label for='contraseña'>Contraseña</label>";
          echo "<input type='password' class='form-control' id='contraseña'  name='contraseña' required>";
        echo "</div>";
      echo "</div>";
      echo "<div class='row'>";
        echo "<div class='col-md-6'>";
          echo "<label for='administrador'>Administrador</label>";
          echo "<input type='checkbox' class='form-control' id='administrador' name='administrador' $check>";
        echo "</div>";
        echo "<div class='col-md-6'>";
          echo "<label for='numero'>Corte</label>";
          echo "<input type='number' class='form-control num' id='Corte' name='Corte' value='{$usuarioRow['Corte']}' min='0' max='999'>";
        echo "</div>";
        echo "<div class='col-md-6'>";
          echo "<label for='numero'>Corte-peinado</label>";
          echo "<input type='number' class='form-control num' id='Corte_peinado' name='Corte_peinado' value='{$usuarioRow['Corte_peinado']}' min='0' max='999'>";
        echo "</div>";
        echo "<div class='col-md-6'>";
          echo "<label for='numero'>Forma</label>";
          echo "<input type='number' class='form-control num' id='Forma' name='Forma' value='{$usuarioRow['Forma']}' min='0' max='999'>";
        echo "</div>";
        echo "<div class='col-md-6'>";
          echo "<label for='numero'>Color</label>";
          echo "<input type='number' class='form-control num' id='Color' name='Color' value='{$usuarioRow['Color']}' min='0' max='999'>";
        echo "</div>";
        echo "<div class='col-md-6'>";
          echo "<label for='numero'>Peinado</label>";
          echo "<input type='number' class='form-control num' id='Peinado' name='Peinado' value='{$usuarioRow['Peinado']}' min='0' max='999'>";
        echo "</div>";
      echo "</div>";
      echo "</div>";
      echo "<button type='submit' class='btn btn-primary modificar_usuario' id='modificar_usuario'>Guardar</button>";
    }
?>