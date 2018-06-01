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
								<th>
									<form>
										<a class="btn" href="<?php echo 'localhost/eventoDetalle.php?id='.$evento['id'] ?>">Detalle</a>
										<?php 
											if ($myrow["rank"] == "2") {
												echo '<a class="btn" href="localhost/eventoDetalle.php?id='.$evento['id'].'">Eliminar</a>';
											}
										  ?>
										
									</form>
								</th>
							</tr>
							<?php } ?>
						</table>


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
