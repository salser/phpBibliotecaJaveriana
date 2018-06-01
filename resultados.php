<?php
define('PAGE_ID', "equipos");
require_once "global.php";

$page_title = "Biblioteca - Resultados Busqueda";

include("inc/templates/subheader.php");

?>
<body>

	<?php include("inc/templates/header.php"); ?>
	<?php include("inc/templates/navigator.php"); ?>

	<section class="main_wrapper">
		<section class="container">

			<section class="info_box">
				<div class="info_title blue">Busqueda</div>

				<div class="article_preview">
					<div class="info_text">

						<p>Resultados</p>

            <?php // https://owlcation.com/stem/Simple-search-PHP-MySQL
            $buscar = $_GET['buscar'];
            $min_length = 1;

            if(strlen($buscar) >= $min_length){ // if query length is more or equal minimum length then

                $buscar = htmlspecialchars($buscar);

                $equipos_query = dbquery("SELECT * FROM equipos WHERE (`nombre` LIKE '%".$buscar."%') ORDER BY id");


                if(mysqli_num_rows($equipos_query) > 0){ // if one or more rows are returned do following

                      while($equipo = mysqli_fetch_array($equipos_query)){

                          echo "<p><h3>".$equipo['nombre']."</h3>"."</p>";
                          // posts results gotten from database(title and text) you can also show id ($results['id'])
                          ?>
                          <table>
                            <tr>
               								<td><img src="./web-gallery/assets/<?=$equipo["imagen"];?>" width="200"></td>
               								<td>
               									<strong><?=$equipo["nombre"];?></strong>
               									<br>
               									Disponibles: <?=$equipo["disponibles"];?>
               									<br>
               									<?php if ($equipo["disponibles"] > 0) { ?>
               									<a href="./equipos.php?pedir=<?=$equipo["id"];?>">Solicitar</a>
               									<?php } else { ?>
               										<div>No hay unidades</div>
               									<?php } ?>
               								</td>
               							</tr>
                          </table>

           							<?php
                        }
                }
                else{ // if there is no matching rows do following
                    echo "No resultados";
                }

            }
            else{ // if query length is less than minimum
                echo "No ingreso ningun termino de busqueda ";
            }

             ?>


						<div class="clear"></div>
					</div>

						<br>
						<form>
							<a href="equipos.php"><span>Volver</span></a>
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
