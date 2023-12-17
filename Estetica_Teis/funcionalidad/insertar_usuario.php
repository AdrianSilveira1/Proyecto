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
 if (isset($_POST["fecha"])) {
    $fecha = $_POST["fecha"];
 } else {
    $fecha = null;
 }
 if (isset($_POST["administrador"])) {
    $administrador = $_POST["administrador"];
 } else {
    $administrador = 0;
 }
 $usuario = new Usuario($id,$nombre, $apellido1, $apellido2, $contraseña, $administrador);
$nada = 0;
 $consulta_usuario = "SELECT * from usuarios WHERE ID = ?";
$stmt = $mysqli->prepare($consulta_usuario);
$stmt->bind_param("s", $id);
$stmt->execute();
$resultado_usuario = $stmt->get_result();
mysqli_stmt_close($stmt);
if(mysqli_num_rows($resultado_usuario) == 0){
    $insertUsuario = "INSERT into usuarios (Id, Nombre, Apellido1, Apellido2, Contraseña, Administrador, Corte, Corte_peinado, Forma, Color, Peinado) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
    $insertado = $mysqli->prepare($insertUsuario);
$insertado->bind_param("sssssssssss",$usuario->getId(),$usuario->getNombre(),$usuario->getApellido1(), $usuario->getApellido2(),hash("sha256", $usuario->getContraseña()),$usuario->getAdministrador(), $nada, $nada,$nada, $nada, $nada );
// Procesar el resultado de la consulta
$insertado->execute();
echo "Usuario insertado con éxito";
}
?>