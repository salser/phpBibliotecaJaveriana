<?php
define('PAGE_ID', "eventos");
require_once "global.php";

$titulo = filter($_POST["titulo"]);
$autor = filter($_POST["autor"]);
$edicion = filter($_POST["edicion"]);
$editorial = filter($_POST["editorial"]);
$paginas = filter($_POST["paginas"]);
$isbn= filter($_POST["isbn"]);
$copias = filter($_POST["copias"]);

$target_dir = "web-gallery/libros/";
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

dbquery("INSERT INTO libros (titulo,autor,edicion,editorial,paginas,isbn,copias,imagen) VALUES ( '$titulo','$autor','$edicion','$editorial','$paginas','$isbn','$copias', '$base_name' )");

header("Location: libros.php");

?>
