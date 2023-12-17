<?php
require_once("../connection/conexion.php");
$_SESSION["administrador"] = "";
if (isset($_POST["usuario"])) {
  $usuario = $_POST["usuario"];
} else {
  $usuario = null;
}
if (isset($_POST["contraseña"])) {
  $contraseña = $_POST["contraseña"];
} else {
  $contraseña = null;
}
$connection = Connection::getInstance();
$mysqli = $connection->getConnection();

$consulta = "SELECT Contraseña, Administrador FROM usuarios WHERE Id = ? ";
$stmt = $mysqli->prepare($consulta);
$stmt->bind_param("s", $usuario);
$stmt->execute();
$stmt->bind_result($hash_resultado, $administrador);

$stmt->fetch();
if (hash_equals($hash_resultado, hash("sha256", $contraseña))) {
  session_start();
  $_SESSION["administrador"] = $administrador;
  $_SESSION["id"] = $usuario;
  //Redirige al usuario a la página principal
  header("Location: ../Inicio.php");
} else {
  echo "El usuario o contraseña son incorrectos";
}
