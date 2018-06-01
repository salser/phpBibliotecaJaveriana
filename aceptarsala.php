<?php
define('PAGE_ID', "salas");
require_once "global.php";

$id = filter($_GET["id"]);

$exists = dbquery("UPDATE salas_solicitudes SET aprobado = '1' WHERE id = $id");

header("Location: salas.php");

?>
