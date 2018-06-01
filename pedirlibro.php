<?php
define('PAGE_ID', "salas");
require_once "global.php";

$id = filter($_GET["id"]);

dbquery("INSERT INTO `libros_solicitudes` (libroid, userid, aprobado) VALUES ('$id', '" . USER_ID . "', '0');");
header("Location: libros.php?pedido=ok");

?>
