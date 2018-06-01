<?php
define('PAGE_ID', "salas");
require_once "global.php";

function getSeconds($tiempo, $unidad) {
  if ($unidad == "Horas") {
    return $tiempo * 3600;
  }
  if ($unidad == "Minutos") {
    return $tiempo * 60;
  }
  return 0;
}

$solicitudid = filter($_GET["solicitudid"]);
$fechainicio = filter($_GET["fechainicio"]);
$tiempo_prestamo = filter($_GET["tiempo_prestamo"]);
$tiempo_prestamo_unidad = filter($_GET["tiempo_prestamo_unidad"]);
$reporte_cada = filter($_GET["reporte_cada"]);
$reporte_cada_unidad = filter($_GET["reporte_cada_unidad"]);

$fechainicio = time();

$tiempo_prestamo = $fechainicio + getSeconds($tiempo_prestamo, $tiempo_prestamo_unidad);
$reporte_cada = getSeconds($reporte_cada, $reporte_cada_unidad);
$lastemail_timestamp = time();

dbquery("UPDATE libros_solicitudes SET fechainicio = '$fechainicio', tiempo = '$tiempo_prestamo', reportecada = '$reporte_cada', aprobado = '1', lastemail_timestamp = '$lastemail_timestamp' WHERE id = '$solicitudid'");

header("Location: libros.php");

?>
