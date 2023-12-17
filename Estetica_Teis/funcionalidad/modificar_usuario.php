<?php 
session_start();
require_once("../clases/usuario.php");
require_once("../connection/conexion.php");
$connection = Connection::getInstance();
$mysqli = $connection->getConnection();
if (isset($_POST["id"])) {
    $id = $_POST["id"];
 } else {
    $id = null;
 }
if (isset($_POST["nombre"])) {
    $nombre = $_POST["nombre"];
 } else {
    $nombre = null;
 }
 if (isset($_POST["apellido1"])) {
    $apellido1 = $_POST["apellido1"];
 } else {
    $apellido1 = null;
 }
 if (isset($_POST["apellido2"])) {
    $apellido2 = $_POST["apellido2"];
 } else {
    $apellido2 = null;
 }
 if (isset($_POST["contraseña"])) {
    $contraseña = $_POST["contraseña"];
 } else {
    $contraseña = null;
 }

 if (isset($_POST["administrador"])) {
    $administrador = $_POST["administrador"];
 } else {
    $administrador = 0;
 }
 if (isset($_POST["Corte"])) {
   $corte = $_POST["Corte"];
} else {
   $corte = 0;
}
if (isset($_POST["Corte_peinado"])) {
   $corte_peinado = $_POST["Corte_peinado"];
} else {
   $corte_peinado = 0;
}
if (isset($_POST["Forma"])) {
   $forma = $_POST["Forma"];
} else {
   $forma = 0;
}if (isset($_POST["Color"])) {
   $color = $_POST["Color"];
} else {
   $color = 0;
}
if (isset($_POST["Peinado"])) {
   $peinado = $_POST["Peinado"];
} else {
   $peinado = 0;
}
 $usuario = new Usuario($id,$nombre, $apellido1, $apellido2, $contraseña, $administrador);

 

    $insertUsuario = "UPDATE usuarios SET  Nombre = ?, Apellido1 = ?, Apellido2 = ?, Contraseña = ?, Administrador = ?, Corte = ?, Corte_peinado = ?, Forma = ?, Color = ?, Peinado = ? WHERE Id= ?";
    $insertado = $mysqli->prepare($insertUsuario);
$insertado->bind_param("sssssssssss",$usuario->getNombre(),$usuario->getApellido1(), $usuario->getApellido2(),hash("sha256", $usuario->getContraseña()),$usuario->getAdministrador(), $corte, $corte_peinado,$forma, $color, $peinado,$id );
// Procesar el resultado de la consulta
$insertado->execute();
echo "Usuario insertado con éxito";

?>