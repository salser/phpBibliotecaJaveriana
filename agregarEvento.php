<?php
define('PAGE_ID', "eventos");
require_once "global.php";

$nombre = filter($_POST["nombre"]);
$lugar = filter($_POST["lugar"]);
$inicio = filter($_POST["inicio"]);
$fin = filter($_POST["fin"]);

dbquery("INSERT INTO eventos (nombre, lugar, fechaInicio, fechaFin) VALUES ( '$nombre', '$lugar', '$inicio', '$fin')");
// echo "INSERT INTO eventos (nombre, lugar, fechaInicio, fechaFin) VALUES ( '$nombre', '$lugar', '$inicio', '$fin')";
header("Location: eventos.php");

?>
