<?php
define('PAGE_ID', "libros");
require_once "global.php";

$page_title = "Biblioteca - Libros";

include("inc/templates/subheader.php");

$libros_query = dbquery("SELECT * FROM libros");

$fields = [];
foreach ($libros_query->fetch_assoc() as $key => $value) {
	$fields[] = $key;
}
$search = "";
if (!isset($_GET["buscar"])) {
	foreach ($_GET as $key => $value) {
		if (strlen($value) != 0) {
			if ($search != "") {
				$search .= " AND " . $key . " LIKE '%" . $value . "%' ";
			} else {
				$search .= " " . $key . " LIKE '%" . $value . "%' ";
			}
		}
	}
} else {
	$search = " titulo " . " LIKE '%" . $_GET["buscar"] . "%' ";
}

if ($search != "") {
	$search = " WHERE " . $search;
}

$libros_query = dbquery("SELECT * FROM libros " . $search);

$libros_solicitudes_query = dbquery("SELECT libros_solicitudes.id, username, titulo FROM libros_solicitudes JOIN libros ON (libroid = libros.id) JOIN users ON (users.id = userid) WHERE aprobado = '0'");

?>
<body>

	<?php include("inc/templates/header.php"); ?>
	<?php include("inc/templates/navigator.php"); ?>

	<section class="main_wrapper">
		<section class="container">

			<section class="info_box">
				<div class="info_title blue">Libros</div>
				<?php if (isset($_GET["pedido"])) { ?>
				<br>
				<div class="info_title green">Solicitud enviada</div>
				<?php } ?>
				<div class="article_preview">
					<div class="info_text">
						<section class="input_box register" style="margin: 0;">
							<div class="title clear">
								Búsqueda básica:
							</div>
							<form>
								<input placeholder="Libro" name="buscar" type="text" style="float: left;">
								<div style="float: left;">&nbsp;&nbsp;</div>
								<input type="submit" value="Buscar" style="float: left;">
							</form>
							<div class="clear"></div>
						</section>

						<div class="title clear">
							Búsqueda avanzada:
						</div>
						<form method="get">
							<?php
							foreach ($fields as $field) {
								if ($field != "id") {
									echo $field;
									echo '<br>';
									echo '<input placeholder="'. $field .'" name="'. $field .'" type="text"><br>';
								}
							}
							 ?>

							<br>
							<input type="submit" value="Buscar" style="float: left;">
						</form>
						<div class="clear"></div>

						<p>Libros disponibles en la biblioteca</p>

						<table>
							<?php
							while ($libro = $libros_query->fetch_assoc()) {
							 ?>
							<tr>
								<td><img src="/web-gallery/libros/<?=$libro["imagen"];?>" height="150"></td>
								<td>
									<strong><?=$libro["titulo"];?></strong>
									<br>
									Editorial: <?=$libro["editorial"];?>
									<br>
									Disponibles: <?=$libro["copias"];?>
									<br>
									<?php if ($libro["copias"] > 0) { ?>
									<a href="/pedirlibro.php?id=<?=$libro["id"];?>">Solicitar</a>
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

			<?php if ($myrow["rank"] > 1) { ?>
			<section class="info_box">
				<div class="info_title green">Solicitudes</div>

				<div class="article_preview">
					<div class="info_text">
						<hr>
						<?php
						while ($solicitud = $libros_solicitudes_query->fetch_assoc()) {
							?>
							<form action="aceptarlibro.php" method="get">
								<input type="hidden" name="solicitudid" value="<?php echo $solicitud["id"] ;?>">
								Fecha inicio préstamo:
	  						<input type="date" name="fechainicio" value="<?php echo date('Y-m-d'); ?>">
								<br>
								Usuario
	  						<input type="text" name="usuario_name" disabled value="<?php echo $solicitud["username"] ;?>">
								<br>
								Elemento
	  						<input type="text" name="libro_name" disabled value="<?php echo $solicitud["titulo"] ;?>">
								<br>
								Tiempo préstamo
	  						<input type="number" name="tiempo_prestamo" value="2"> <select name="tiempo_prestamo_unidad"><option value="Minutos">Minutos</option><option value="Horas">Horas</option></select>
								<br>
								Reporte cada
	  						<input type="number" name="reporte_cada" value="5"> <select name="reporte_cada_unidad"><option value="Minutos">Minutos</option><option value="Horas">Horas</option></select>
								<br>

								<input type="submit" value="Aceptar">
								<br>
								<br>
								<form action="denegarlibro.php" method="get">
									<input type="submit" value="Denegar">
									<input type="hidden" name="solicitudid" value="<?php echo $solicitud["id"] ;?>">
									Causa
		  						<input type="text" name="causa">
								</form>

							<hr>
							<?php
						}
						?>
					</div>
				</div>
			</section>

			<section class="info_box">
				<div class="info_title orange">Agregar libros</div>

				<div class="article_preview">
					<div class="info_text">

							<form action="agregarLibro.php" method="post" enctype="multipart/form-data">
								Titulo
	  						<input type="text" name="titulo" value="">
								<br>
								Autor
	  						<input type="text" name="autor" value="">
								<br>
								Edicion
	  						<input type="text" name="edicion" value="">
								<br>
								Editorial
	  						<input type="text" name="editorial" value="">
								<br>
								Páginas
	  						<input type="text" name="paginas" value="">
								<br>
								ISBN
	  						<input type="text" name="isbn" value="">
								<br>
								Copias
	  						<input type="text" name="copias" value="">
								<br>
								<br>
								Imagen
								<input type="file" name="fileToUpload" id="fileToUpload">
								<br>
								<br>

								<input type="submit" value="Aceptar">
							</form>

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
