<?php
define('PAGE_ID', "salas");
require_once "global.php";

$solicitudid = filter($_GET["solicitudid"]);
$fechainicio = filter($_GET["fechainicio"]);
$tiempo_prestamo = filter($_GET["tiempo_prestamo"]);
$reporte_cada = filter($_GET["reporte_cada"]);

dbquery("UPDATE libros_solicitudes SET fechainicio = '$fechainicio', tiempo = '$tiempo_prestamo', reportecada = '$reporte_cada', aprobado = '1' WHERE id = '$solicitudid'");

header("Location: libros.php");

?>
