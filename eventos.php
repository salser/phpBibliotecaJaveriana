<?php
define('PAGE_ID', "eventos");
require_once "global.php";

$page_title = "Biblioteca - Eventos";

include("inc/templates/subheader.php");

$eventos_query = dbquery("SELECT * FROM eventos ORDER BY id");

?>
<body>

	<?php include("inc/templates/header.php"); ?> 
	<?php include("inc/templates/navigator.php"); ?>

	<section class="main_wrapper">
		<section class="container">

			<section class="info_box">
				<div class="info_title blue">Eventos</div>

				<div class="article_preview">
					<div class="info_text">

						<p>Eventos Javeriana</p>

						<table>
							<tr>
								<th>Evento #</th>
								<th>Lugar</th>
								<th>Fecha y Hora inicio</th>
								<th>Fecha y Hora Fin</th>
								<th>Nombre</th>
								<th>Acciones</th>
							</tr>
							<?php
							while ($evento = $eventos_query->fetch_assoc()) {
							 ?>
							<tr>
								<td>
									<strong><?=$evento["id"];?></strong>
								</td>
								<td>
									<strong><?=$evento["lugar"];?></strong>
								</td>
								<td>
									<strong><?=$evento["fechaInicio"];?></strong>
								</td>
								<td>
									<strong><?=$evento["fechaFin"];?></strong>
								</td>
								<td>
									<strong><?=$evento["nombre"];?></strong>
								</td>
								<th>
									<form>
										<a class="btn" href="<?php echo 'eventoDetalle.php?id='.$evento['id'] ?>">Detalle</a>
										<?php 
											if ($myrow["rank"] == "2") {
												echo '<a class="btn" href="/denegarEvento.php?id='.$evento['id'].'">Eliminar</a>';
											}
										  ?>
										
									</form>
								</th>
							</tr>
							<?php } ?>
						</table>
						<?php 
							if ($myrow["rank"] == "2") {
							
								?>
								
								<form action="agregarEvento.php" method="POST">
									<label for="nombre" >Nombre</label>
							 		<br>
									<input type="text" name="nombre" id="nombre">
									<br>
									<label for="lugar" >Lugar</label>
									<br>
									<input type="text" name="lugar" id="lugar" >
									<br>
									<label for="inicio">Fecha Inicio</label>
									<br>
									<input type="datetime-local" name="inicio" id="inicio" value="">
									<br>
									<label for="fin">Fecha fin</label>
									<br>
									<input type="datetime-local" name="fin" id="fin">
									<br>
									<input type="submit" name="Actualizar"><input type="submit" value="Agregar">
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
	<?php include("inc/templates/footer.php"); ?>
	<script src="//code.jquery.com/jquery-1.12.0.min.js"></script>
</body>
</html>
