<?php
require_once("../connection/conexion.php");
$connection = Connection::getInstance();
$mysqli = $connection->getConnection();
if (isset($_POST["id"])) {
    $id = $_POST["id"];
}
if (isset($_POST['citas'])) {
    $borrado_citas = "DELETE FROM citas WHERE Id = ?";
    $borrado = $mysqli->prepare($borrado_citas);
    $borrado->bind_param("s", $id);
    $borrado->execute();
    echo "Borrado con éxito";
} else {
    $borrado_citas = "DELETE FROM citas WHERE Agendador = ?";
    $borrado = $mysqli->prepare($borrado_citas);
    $borrado->bind_param("s", $id);
    $borrado->execute();
    $borrado_usuario = "DELETE FROM usuarios WHERE Id = ?";
    $borrado = $mysqli->prepare($borrado_usuario);
    $borrado->bind_param("s", $id);
    $borrado->execute();
    echo "Borrado con éxito";
}
