<?php
define('PAGE_ID', "salas");
require_once "global.php";

$id = filter($_GET["id"]);

$exists = dbquery("DELETE FROM eventos WHERE id = $id");

header("Location: eventos.php");

?>
