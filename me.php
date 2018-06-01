<?php
define('PAGE_ID', "me");
require_once "global.php";

if (!LOGGED_IN)
{
	header("Location: " . WWW . "/");
	exit;
}

$page_title = "Biblioteca - " . $myrow["username"] ;

include("inc/templates/subheader.php");
?>
<body>

	<?php include("inc/templates/header.php"); ?>
	<?php include("inc/templates/navigator.php"); ?>

	<section class="main_wrapper">
		<section class="container">
			<section class="left_column me">
				<section class="info_box user">

					<section class="user_info">

						<section class="user_name">
							<?php echo USER_NAME; ?>
						</section>

						<section class="user_motto">
							<?php echo $myrow["rank"] == "1" ? "Usuario" : "Administrador" ?>
						</section>

						<a href="salas.php"><button>
							Pedir salas
						</button></a>
					</section>

				</section>
			</section>

			<section class="right_column me">
				<section class="info_box radio_box centered">
					<br>
					<img src="web-gallery/images/puj.png">

				</section>
			</section>

			<section class="clear"></section>


		</section>
	</section>

	<?php include("inc/templates/footer.php"); ?>

	<link rel="stylesheet" type="text/css" href="//maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css" />
	<script src="//code.jquery.com/jquery-1.12.0.min.js"></script>
</body>
</html>
