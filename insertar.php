<?php
define('PAGE_ID', "equipos");
require_once "global.php";

$page_title = "Biblioteca - Insertar Equipos";

include("inc/templates/subheader.php");

?>
<body>

	<?php include("inc/templates/header.php"); ?>
	<?php include("inc/templates/navigator.php"); ?>

	<?php
// define variables and set to empty values
$nomEquipoErr = $cantidadErr = "";
$nomEquipo = $cantidad = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

  if (empty($_POST["nomEquipo"])) {
    $nomEquipoErr = "Introduzca un nombre del equipo";
  } else {
    $nomEquipo = test_input($_POST["nomEquipo"]);
    if (!preg_match("/^[a-zA-Z0-9 ]*$/",$nomEquipo)) {
      $nomEquipoErr = "Solo caracteres alfanumericos son validos";
    }
  }

  if (empty($_POST["cantidad"])) {
    $cantidadErr = "Introduzca una cantidad";
  } else {
    $cantidad = test_input($_POST["cantidad"]);
    if (!preg_match("/^[0-9]*$/",$cantidad)) {
      $cantidadErr = "Solo numeros son validos";
    }
  }


}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>

	<section class="main_wrapper">
		<section class="container">

			<section class="info_box">
				<div class="info_title blue">Insertar Equipos</div>

				<div class="article_preview">
					<div class="info_text">
						<section class="input_box register" style="margin: 0;">
							<div class="title clear">
								Insertar equipos:
							</div>
							<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
								<input placeholder="Nombre equipo" name="nomEquipo" type="text" style="float: left;" value="<?php echo $nomEquipo;?>">

								<div style="float: left;">&nbsp;&nbsp;</div>
								<input placeholder="Cantidad" name="cantidad" type="number" style="float: left;" value="<?php echo $cantidad;?>">

								<div style="float: left;">&nbsp;&nbsp;</div>
								<input type="submit" value="Insertar" onclick="history.back()" style="float: left;">
							</form>
							<div class="clear"></div>
						</section>


						<div class="clear"></div>
					</div>

					<?php
					$count = dbquery("SELECT COUNT(*) as total FROM equipos");
					$aux = mysqli_fetch_assoc($count);
					$id = $aux['total'] + 1;
					if (!empty($nomEquipo) && !empty($cantidad)) {
						$sql = dbquery("INSERT INTO equipos (id,nombre,disponibles,imagen) VALUES ('$id','$nomEquipo','$cantidad',NULL)");
						echo "Equipo ha sido insertado exitosamente.";
					}
					else {
						echo "equipment not inserted.";
					}

					?>

						<br>
						<form>
							<a href="equipos.php"><span>Regresar</span></a>
						</form>
						<div class="clear"></div>
				</div>

			</section>

		</section>
	</section>
	<?php include("inc/templates/footer.php"); ?>
	<script src="//code.jquery.com/jquery-1.12.0.min.js"></script>
</body>
</html>
