<?php
define('PAGE_ID', "salas");
require_once "global.php";

$id = filter($_GET["id"]);

$salas_solicitudes_query = dbquery("SELECT * FROM salas_solicitudes JOIN salas on (salas.id = salas_solicitudes.salaid) JOIN users on (users.id = userid) WHERE salas_solicitudes.id = $id");
if ($salas_solicitudes_query->num_rows > 0) {
  $exists = dbquery("UPDATE salas_solicitudes SET aprobado = '1' WHERE id = $id");
  $solicitud = $salas_solicitudes_query->fetch_assoc();
  sendMail($solicitud["mail"], "Biblioteca", "Solicitud de sala aceptada", "Se ha aceptado una solicitud: " . $info = $solicitud["nombre"] . " - " . $solicitud["hora"] . ":00 - " . $solicitud["username"]);
}


header("Location: salas.php");

?>
