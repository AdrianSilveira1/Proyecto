<?php
session_start();
require_once("../clases/cita.php");
require_once("../clases/cliente.php");
require_once("../connection/conexion.php");
$array = [];
if (isset($_POST["nombre_cliente"])) {
   $nombre = $_POST["nombre_cliente"];
} else {
   $nombre = null;
}
if (isset($_POST["apellidocliente1"])) {
   $apellido1 = $_POST["apellidocliente1"];
} else {
   $apellido1 = null;
}
if (isset($_POST["apellidocliente2"])) {
   $apellido2 = $_POST["apellidocliente2"];
} else {
   $apellido2 = null;
}
if (isset($_POST["servicio"])) {
   $servicio = $_POST["servicio"];
} else {
   $servicio = null;
}
if (isset($_POST["fecha"])) {
   $fecha = $_POST["fecha"];
} else {
   $fecha = null;
}
if (isset($_POST["telefono"])) {
   $telefono = (int)$_POST["telefono"];
} else {
   $telefono = null;
}
$id_agendador = $_SESSION["id"];
$numero = 1;
$cita = new Cita($nombre, $apellido1, $apellido2, $servicio, new \DateTime($fecha), $telefono);
$fecha = $cita->getFecha()->format("Y-m-d");
$servicio = $cita->getServicio();
$connection = Connection::getInstance();
$mysqli = $connection->getConnection();
$consulta1 = "SELECT * from clientes WHERE Nombre = ? AND Apellido1 = ? AND Apellido2 = ?";
$stmt1 = $mysqli->prepare($consulta1);
$stmt1->bind_param("sss", $nombre, $apellido1, $apellido2);
$stmt1->execute();
  // echo mysqli_num_rows($stmt1->get_result());
if (mysqli_num_rows($stmt1->get_result()) > 0) {
  
  // Se ha encontrado resultado
mysqli_stmt_close($stmt1);
$consulta6 = "SELECT N_citas from clientes WHERE Nombre = ? AND Apellido1 = ? AND Apellido2 = ?";
$stmt6 = $mysqli->prepare($consulta6);
$stmt6->bind_param("sss", $nombre, $apellido1, $apellido2);
$stmt6->execute();
$resultado6 = $stmt6->get_result();
$row_citas= mysqli_fetch_assoc($resultado6);
$n_citas =$row_citas['N_citas'];
$consulta4 = "SELECT Id from clientes WHERE Nombre = ? AND Apellido1 = ? AND Apellido2 = ?";
$stmt4 = $mysqli->prepare($consulta4);
$stmt4->bind_param("sss", $nombre, $apellido1, $apellido2);
$stmt4->execute();
$resultado4 = $stmt4->get_result();
$id = mysqli_fetch_assoc($resultado4);
$id_cliente = $id['Id'];
$consulta5 = "UPDATE clientes SET N_citas = ($n_citas + 1) WHERE Id = $id_cliente";
$stmt5 = $mysqli->prepare($consulta5);
$stmt5->execute();
$consulta3 = "INSERT into citas (Fecha, Agendador, Cliente, Servicio) VALUES (?, ?, ?, ?)";
$stmt3 = $mysqli->prepare($consulta3);
$stmt3->bind_param("ssss", $cita->getFecha()->format("Y-m-d"), $_SESSION["id"], $id_cliente, $cita->getServicio());
// Procesar el resultado de la consulta
$stmt3->execute();

} else {
    
mysqli_stmt_close($stmt1);
// No se han encontrado
$cliente = new Cliente($nombre, $apellido1, $apellido2, $telefono);
$consulta2 = "INSERT into clientes (Nombre, Apellido1, Apellido2,N_citas, Telefono) VALUES (?, ?, ?, ?, ?)";
$stmt2 = $mysqli->prepare($consulta2);
$stmt2->bind_param("sssss", $cliente->getNombre(),$cliente->getApellido1(), $cliente->getApellido2(), $numero, $cliente->getTelefono());
// Procesar el resultado de la consulta
$stmt2->execute();
$consulta4 = "SELECT Id from clientes WHERE Nombre = ? AND Apellido1 = ? AND Apellido2 = ?";
$stmt4 = $mysqli->prepare($consulta4);
$stmt4->bind_param("sss", $nombre, $apellido1, $apellido2);
$stmt4->execute();
$resultado4 = $stmt4->get_result();
$id = mysqli_fetch_assoc($resultado4);
$id_cliente = $id['Id'];
$consulta3 = "INSERT into citas (Fecha, Agendador, Cliente, Servicio) VALUES (?, ?, ?, ?)";
$stmt3 = $mysqli->prepare($consulta3);
$stmt3->bind_param("ssss", $fecha, $id_agendador, $id_cliente, $servicio);
// Procesar el resultado de la consulta
$stmt3->execute();

}

function parseado($cadena) {
   // Convertir a minúsculas
   $cadena = strtolower($cadena);

   // Eliminar acentos
   $cadena = strtr($cadena, "ÁÉÍÓÚáéíóú", "aeiouaeiou");

   return $cadena;
}