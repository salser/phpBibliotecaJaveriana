<?php
define('PAGE_ID', "salas");
require_once "global.php";

$page_title = "Biblioteca - Salas";

include("inc/templates/subheader.php");

$salas_query = dbquery("SELECT * FROM salas ORDER BY id");
$salas_solicitudes_query = dbquery("SELECT * FROM salas_solicitudes JOIN salas on (salas.id = salas_solicitudes.salaid) JOIN users on (users.id = userid) WHERE aprobado = '1';");
$salas_solicitudes_no_aprobados_query = dbquery("SELECT salas_solicitudes.id, nombre, hora, dia, username FROM salas_solicitudes JOIN salas on (salas.id = salas_solicitudes.salaid) JOIN users on (users.id = userid) WHERE aprobado = '0';");

$dias_ocupados = [];

while ($solicitud = $salas_solicitudes_query->fetch_assoc()) {
	$info = $solicitud["nombre"] . " - " . $solicitud["hora"] . ":00 - " . $solicitud["username"];
	if (isset($dias_ocupados[$solicitud["dia"]])) {
		$dias_ocupados[$solicitud["dia"]] .= "<br>" . $info;
	} else {
		$dias_ocupados[$solicitud["dia"]] = $info;
	}
}
?>
<body>

	<?php include("inc/templates/header.php"); ?>
	<?php include("inc/templates/navigator.php"); ?>

	<section class="main_wrapper">
		<section class="container">

			<section class="info_box">
				<div class="info_title blue">Salas</div>

				<div class="article_preview">
					<div class="info_text">

						<p>Calendario para junio</p>

						<table>
							<thead style="background-color: #eeeeee;">
								<tr>
									<td>Domingo</td>
									<td>Lunes</td>
									<td>Martes</td>
									<td>Miércoles</td>
									<td>Jueves</td>
									<td>Viernes</td>
									<td>Sábado</td>
								</tr>
							</thead>
							<tbody>
								<?php
								$offset = -4;
								$days = 30;
								$currentDay = $offset;
								while ($currentDay <= $days) {
									echo '<tr>';
									for ($j = 0; $j < 7; $j++) {
										if ($currentDay > 0 && $currentDay <= $days) {
											echo "<td>";
											echo $currentDay;
											if (isset($dias_ocupados[$currentDay])) {
												echo "<br>";
												echo $dias_ocupados[$currentDay];
											}

											echo "</td>";
										} else {
											echo '<td></td>';
										}
										$currentDay++;
									}
									echo '</tr>';
								}
								?>
							</tbody>
						</table>


						<div class="clear"></div>
					</div>
				</div>

			</section>

			<section class="info_box">
				<div class="info_title orange">Pedir sala</div>
				<?php if (isset($_GET["error"])) { ?>
				<br>
				<div class="info_title red">La sala está ocupada</div>
				<?php } ?>
				<div class="article_preview">
					<div class="info_text">
						<form method="get" action="pedirsala.php">
							Día del mes:
							<select name="day">
								<?php
								for ($i = 1; $i <= 30; $i++) {
									echo "<option value=\"$i\">$i</option>";
								}
								?>
							</select>
							<br>
							Hora:
							<select name="hour">
								<?php
								for ($i = 0; $i <= 23; $i++) {
									echo "<option value=\"$i\">$i:00</option>";
								}
								?>
							</select>
							<br>
							Sala:
							<select name="room">
								<?php
								while ($sala = $salas_query->fetch_assoc()) {
									echo '<option value="' . $sala["id"].'">' . $sala["nombre"] . '</option>';
								}
								?>
							</select>
							<br>
							<br>
							<input type="submit" value="Pedir sala">
						</form>
					</div>
				</div>
			</section>
			<?php if ($myrow["rank"] > 1) { ?>
			<section class="info_box">
				<div class="info_title green">Solicitudes</div>

				<div class="article_preview">
					<div class="info_text">
						<p></p>
						<?php
						while ($solicitud = $salas_solicitudes_no_aprobados_query->fetch_assoc()) {
							$info = $solicitud["nombre"] . " - " . $solicitud["hora"] . ":00 - " . $solicitud["username"];
							echo $info . '<br><a href="aceptarsala.php?id=' . $solicitud["id"] . '">Aceptar</a> - <a href="denegarsala.php?id=' . $solicitud["id"] . '">Denegar</a><br><br>';
						}
						?>
					</div>
				</div>
			</section>
			<?php } ?>
		</section>
	</section>
	<?php include("inc/templates/footer.php"); ?>
	<script src="//code.jquery.com/jquery-1.12.0.min.js"></script>
</body>
</html>
