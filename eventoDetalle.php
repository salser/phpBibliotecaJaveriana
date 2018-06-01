<?php
define('PAGE_ID', "eventos");
require_once "global.php";

if(isset($_GET['id']) && isset($_GET['email']) && isset($_GET['idU'])){
	$subscribe_query = dbquery("INSERT INTO eventosxusuario (idEvento, idUser, mail)
	 VALUES
	  ('".$_GET['id']."','".$_GET['idU']."','".$_GET['email']."')");
	sendMail($_GET['email'], "Biblioteca", "Seregistro correctamente en el evento", "Seregistro correctamente en el evento");
}
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
	$nombre = $_POST['nombre'];
			$lugar = $_POST['lugar'];
			$fInicio = $_POST['inicio'];
			$fFin = $_POST['fin'];
	// TODO acabar actualización salas
	if(isset($_POST['id']) && isset($_POST['nombre']) && isset($_POST['lugar'])  ){
		if(isset($_POST['inicioChange']) && isset($_POST['finChange']) && isset($_POST['inicio']) && isset($_POST['fin'])){
			
			dbquery("UPDATE eventos SET nombre='".$nombre."', lugar='".$lugar."',fechaInicio='".$fInicio."',fechaFin='".$fFin."' WHERE id=".$_POST['id']);
		} else if (isset($_POST['inicioChange']) && !isset($_POST['finChange']) && isset($_POST['inicio'])) {
			dbquery("UPDATE eventos SET nombre='".$nombre."', lugar='".$lugar."',fechaInicio='".$fInicio."'WHERE id=".$_POST['id']);
		} else if (!isset($_POST['inicioChange']) && isset($_POST['finChange']) && isset($_POST['fin'])){
			dbquery("UPDATE eventos SET nombre='".$nombre."', lugar='".$lugar."',fechaFin='".$fFin."'WHERE id=".$_POST['id']);
		} else {
			dbquery("UPDATE eventos SET nombre='".$nombre."', lugar='".$lugar."' WHERE id=".$_POST['id']);
		}
	}	
}


$id = null;
if(isset($_GET['id'])){
	$id = filter($_GET['id']);
}
$evento_query = dbquery("SELECT * FROM eventos WHERE id=".$id);
$evento = $evento_query->fetch_assoc();


$page_title = "Biblioteca - Detalle ".$id;

include("inc/templates/subheader.php");
?>

<body>

	<?php include("inc/templates/header.php"); ?> 
	<?php include("inc/templates/navigator.php"); ?>

	<?php 
		if($evento) {
	 ?>
	<section class="main_wrapper">
		<section class="container">

			<section class="info_box">
				<div class="info_title blue">Evento con id <?php echo $evento['id']; ?></div>

				<div class="article_preview">
					<div class="info_text">
						<?php 
							if ($myrow["rank"] == "1") {
						 ?>
						
					 		<label for="nombre" >Nombre</label>
					 		<br>
							<input type="text" name="nombre" id="nombre" value="<?php echo $evento['nombre'] ?>" disabled>
							<br>
					 		<label for="lugar" >Lugar</label>
					 		<br>
							<input type="text" name="lugar" id="lugar" value="<?php echo $evento['lugar'] ?>" disabled>
							<br>
							<label for="inicio" >Fecha Inicio</label>
							<br>
							<input type="text" name="inicio" id="inicio" value="<?php echo $evento['fechaInicio'] ?>" disabled>
							<br>
							<label for="fin" >Fecha Fin</label>
							<br>
							<input type="text" name="fin" id="fin" value="<?php echo $evento['fechaFin'] ?>" disabled>
							<br>
							<?php 
							$intermediate_query = dbquery("SELECT * FROM eventosxusuario WHERE idUser=".$myrow["id"]." AND idEvento=".$evento["id"]);
							$intermediate = $intermediate_query->fetch_assoc();
							if (!$intermediate) {
							 ?>
							<hr>
							<h4>Subscribirse</h4>
						<form method="GET">
							<input type="hidden" name="id" id="id" value="<?php echo $evento['id'] ?>">
							<input type="hidden" name="idU" id="idU" value="<?php echo $myrow['id'] ?>">
							<label for="user" >Usuario</label>
							<br>
							<input type="text" name="user" id="user" value="<?php echo $myrow['username'] ?>" disabled>
							<br>
							<label for="email" >Correo Electrónico</label>
							<br>
							<input type="email" name="email" id="email" value="<?php echo $myrow['mail'] ?>" style="margin-bottom: 20px;">
							<br>
							<input type="submit" value="Subscribir">
						</form>
							<?php } else {
								echo "<h1>Usted ya está inscrito en este evento</h1>";
							} ?>
						 

						<?php
							 } else {
						?>
								<form method="POST">
									<input type="hidden" name="id" id="id" value="<?php echo $evento['id'] ?>">
									<label for="nombre" >Nombre</label>
							 		<br>
									<input type="text" name="nombre" id="nombre" value="<?php echo $evento['nombre'] ?>">
									<br>
									<label for="lugar" >Lugar</label>
									<br>
									<input type="text" name="lugar" id="lugar" value="<?php echo $evento['lugar'] ?>">
									<br>
									<label for="inicio">Fecha Inicio</label>
									<input type="checkbox" name="inicioChange" value="yes">
									<br>
									<?php echo date("Y-m-d\TH:i:sP", strtotime($evento['fechaInicio'])); ?>
									<br>
									<input type="datetime-local" name="inicio" id="inicio" value="">
									<br>
									<label for="fin">Fecha fin</label>
									<input type="checkbox" name="finChange" value="yes">
									<br>
									<?php echo date("Y-m-d\TH:i:sP", strtotime($evento['fechaFin'])); ?>
									<br>
									<input type="datetime-local" name="fin" id="fin">
									<br>
									<input type="submit" name="Actualizar">
								</form>
						<?php
						 	 } 
						?>

						<div class="clear"></div>
					</div>
				</div>

			</section>

		</section>
	</section>
	<?php } else {
		echo "404 PAGE NOT FOUND";
	} ?>
	<?php include("inc/templates/footer.php"); ?>
	<script src="//code.jquery.com/jquery-1.12.0.min.js"></script>
</body>
</html>
