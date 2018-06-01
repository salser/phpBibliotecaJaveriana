<?php
define('PAGE_ID', "salas");
require_once "global.php";

$day = filter($_GET["day"]);
$hour = filter($_GET["hour"]);
$room = filter($_GET["room"]);

$exists = dbqueryEvaluate("SELECT count(*) FROM salas_solicitudes WHERE dia = $day AND hora = $hour AND salaid = $room AND aprobado = '1';");
if ($exists == 0) {
	dbquery("INSERT INTO `salas_solicitudes` (salaid, userid, dia, hora, aprobado) VALUES ('$room', '" . USER_ID . "', '$day', '$hour', '0');");
	header("Location: salas.php");
} else {
	header("Location: salas.php?error=true");
}

?>
