<?php
define('PAGE_ID', "salas");
require_once "global.php";

$id = filter($_GET["id"]);

$exists = dbquery("DELETE FROM salas_solicitudes WHERE id = $id");

header("Location: salas.php");

?>
