<?php
define('PAGE_ID', "register");
require_once "global.php";

if (LOGGED_IN)
{
	header("Location: " . WWW . "/me");
	exit;
}

$page_title = "Biblioteca - Registro";
include("inc/templates/subheader.php");

$register_errors = "";
$red_username = false;
$red_email = false;
$red_password = false;

if (isset($_POST['register_username']) && isset($_POST['register_email']) && isset($_POST['register_password']) && isset($_POST['register_password_check']))
{
	$reg_terms_checked = isset($_POST['register_terms_check']);

	$register_username = $_POST['register_username'];
	$register_email = $_POST['register_email'];
	$register_password = $_POST['register_password'];
	$register_password_check = $_POST['register_password_check'];

	$reg_username = filter($register_username);
	$reg_email = filter($register_email);
	$reg_password = filter($register_password);
	$reg_password_check = filter($register_password_check);

	$isValidEmail = $users->IsValidEmail($reg_email) && $register_email == $reg_email;
	$isValidUser = $users->IsValidName($reg_username) && $register_username == $reg_username;
	$isValidPassword = strlen($reg_password) >= 3 && strlen($reg_password) <= 20;

	if (!$isValidUser)
	{
		$register_errors .= '<div class="info_title red">Nombre de usuario inválido</div>';
		$red_username = true;
	}
	else
	{
		if ($users->IsNameTaken($register_username))
		{
			$register_errors .= '<div class="info_title red">Ese nombre ya está en uso</div>';
			$red_username = true;
			$isValidUser = false;
		}
	}

	if (!$isValidEmail)
	{
		$register_errors .= '<div class="info_title red">Email inválido</div>';
		$red_email = true;
	}
	else
	{
		if ($users->IsEmailTaken($reg_email))
		{
			$register_errors .= '<div class="info_title red">Ese email ya está en uso</div>';
			$red_email = true;
			$isValidEmail = false;
		}
	}

	if (!$isValidPassword)
	{
		$register_errors .= '<div class="info_title red">Contraseña inválida</div>';
		$red_password = true;
	}
	else
	{
		if ($reg_password != $reg_password_check || $reg_password_check != $register_password)
		{
			$register_errors .= '<div class="info_title red">Las contraseñas no coinciden</div>';
			$red_password = true;
			$isValidPassword = false;
		}
	}

	if ($isValidUser && $isValidEmail && $isValidPassword && !isset($_SESSION['db_inserted']))
	{
		dbquery("INSERT INTO users (username, password, mail, rank) VALUES
		('" . $reg_username . "','" . $core->UberHash($reg_password) . "','".$register_email."','1')");

		$_SESSION['UBER_USER_E'] = $reg_username;
		$_SESSION['UBER_USER_H'] = $core->UberHash($reg_password);
		$_SESSION['set_cookies'] = true;
		$_SESSION['db_inserted'] = true;

		header("Location: " . WWW . "/security_check");
		exit;
	}
}

?>
<body class="index">

	<header>
		<section class="little_container">

			<section id="logo" class="little_container boy">
				<a href="/" >habboinn</a>
			</section>

		</section>
	</header>

	<section class="main_wrapper">
		<section class="container">

			<section class="left_column me">
				<section class="info_box">
					<div class="info_title green">Registro</div>

					<?php if (strlen($register_errors) > 0) echo '<br>' . $register_errors; ?>

					<form method="post">
						<section class="input_box register">
							<div class="title clear">
								Nombre de usuario:
							</div>
							<input <?php if ($red_username) { echo 'class="wrong"'; } ?> placeholder="Usuario" name="register_username" type="text" <?php if (isset($reg_username)) { echo 'value="' . clean($reg_username) . '"'; } ?>>
							<div class="small_text">De 3 a 14 carácteres. Letras, números y carácteres como (. , ; : - @).</div>
						</section>

						<section class="input_box register">
							<div class="title clear">
								Correo electrónico:
							</div>
							<input <?php if ($red_email) { echo 'class="wrong"'; } ?> placeholder="Correo electrónico" name="register_email" type="text" <?php if (isset($reg_email)) { echo 'value="' . clean($reg_email) . '"'; } ?>>
							<div class="small_text">¡Para estar en contacto en caso de problemas!</div>
						</section>

						<section class="input_box register">
							<div class="title clear">
								Contraseña:
							</div>
							<input <?php if ($red_password) { echo 'class="wrong"'; } ?> placeholder="Contraseña" name="register_password" type="password">
							<div class="small_text">Se recomiendan mayúsculas, minúsculas y números a la vez.</div>
						</section>

						<section class="input_box register">
							<div class="title clear">
								Repite contraseña:
							</div>
							<input <?php if ($red_password) { echo 'class="wrong"'; } ?> placeholder="Contraseña" name="register_password_check" type="password">
							<div class="small_text">Por seguridad.</div>
						</section>

						<section class="input_box register">
							<input name="register_terms_check" type="checkbox"> Acepto los términos y condiciones.
							<input type="submit" value="Confirmar">
						</section>
					</form>
					<div class="clear"></div>

				</section>
			</section>

			<section class="right_column me">
				<section class="info_box">
					<div class="info_title blue">Biblioteca</div>
					<center>
						<br>
						<img src="/web-gallery/images/puj.png">
					</center>
					<center>
						Bienvenido a la biblioteca
					</center>
				</section>

			</section>
			<div class="clear"></div>
		</section>

	</section>
	<?php include("inc/templates/footer.php"); ?>
</body>
</html>
