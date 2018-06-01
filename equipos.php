<?php
define('PAGE_ID', "equipos");
require_once "global.php";

$page_title = "Biblioteca - Equipos";

include("inc/templates/subheader.php");

$equipos_query = dbquery("SELECT * FROM equipos ORDER BY id");

?>
<body>

	<?php include("inc/templates/header.php"); ?>
	<?php include("inc/templates/navigator.php"); ?>

	<section class="main_wrapper">
		<section class="container">

			<section class="info_box">
				<div class="info_title blue">Equipos</div>

				<div class="article_preview">
					<div class="info_text">
						<section class="input_box register" style="margin: 0;">
							<div class="title clear">
								Buscar equipos:
							</div>
							<form>
								<input placeholder="Buscar" name="buscar" type="text" style="float: left;">
								<div style="float: left;">&nbsp;&nbsp;</div>
								<input type="submit" value="Buscar" style="float: left;">
							</form>
							<div class="clear"></div>
						</section>

						<p>Equipos disponibles en la biblioteca</p>

						<table>
							<?php
							while ($equipo = $equipos_query->fetch_assoc()) {
							 ?>
							<tr>
								<td><img src="/web-gallery/assets/<?=$equipo["imagen"];?>" width="200"></td>
								<td>
									<strong><?=$equipo["nombre"];?></strong>
									<br>
									Disponibles: <?=$equipo["disponibles"];?>
									<br>
									<?php if ($equipo["disponibles"] > 0) { ?>
									<a href="/equipos.php?pedir=<?=$equipo["id"];?>">Solicitar</a>
									<?php } else { ?>
										<div>No hay unidades</div>
									<?php } ?>
								</td>
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
