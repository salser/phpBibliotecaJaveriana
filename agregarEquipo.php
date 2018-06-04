<?php
define('PAGE_ID', "eventos");
require_once "global.php";

$nombre = filter($_POST["nombre"]);
$disponibles = filter($_POST["disponibles"]);

$target_dir = "web-gallery/assets/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
echo "Target: " . $target_file . "<br>";
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
$base_name = basename($_FILES["fileToUpload"]["name"]);
if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
    //echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
} else {
    //echo "Sorry, there was an error uploading your file.";
}
//echo basename($_FILES["fileToUpload"]["name"]);

dbquery("INSERT INTO equipos (nombre,disponibles,imagen) VALUES ('$nombre','$disponibles','$base_name')");

header("Location: equipos.php");

?>
