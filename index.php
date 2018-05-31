<?php
define('PAGE_ID', "index");
require_once "global.php";

if (LOGGED_IN)
{
	header("Location: " . WWW . "/me");
	exit;
}

$page_title = "Biblioteca - Inicio";

$login_result = "";
$credentials_username = "";

$password_red = false;
$username_red = false;

if (isset($_POST['credentials_username']) && isset($_POST['credentials_password']))
{
	$credentials_username = $_POST['credentials_username'];
	$credUser = filter($_POST['credentials_username']);
	$credPass = filter($_POST['credentials_password']);

	if ($credUser != $credentials_username)
	{
		$credUser = "";
	}

	if (strlen($credUser) < 1)
	{
		$login_result = '<section class="login_error">' . "Por favor, ingresa tu usuario" . '</section>';
		$username_red = true;
		$password_red = true;
	}
	elseif (strlen($credPass) < 1)
	{
		$login_result = '<section class="login_error">' . "Por favor, ingresa tu contraseña" . '</section>';
		$password_red = true;
	}
	else
	{
		if ($users->ValidateUser($credUser, $core->UberHash($credPass)))
		{
			$_SESSION['UBER_USER_E'] = $credUser;
			$_SESSION['UBER_USER_H'] = $core->UberHash($credPass);

			if (isset($_POST['login_remember_me']))
			{
				$_SESSION['set_cookies'] = true;
			}

			header("Location: " . WWW . "/security_check");
			exit;
		}
		else
		{
			$login_result = '<section class="login_error">' . "La contraseña no es correcta" . '</section>';
			$password_red = true;
		}
	}
}

include("inc/templates/subheader.php");
?>
<body class="index">
	<?php echo $login_result; ?>
	<header>
		<section class="container">
			<section id="logo">
				<a href="/" >habboinn</a>
			</section>
			<form action="/" method="post">
				<section class="input_box">
					Usuario:
					<br>
					<input <?php if ($username_red) { echo 'class="wrong"'; } ?> placeholder="Usuario" name="credentials_username" type="text" <?php if (isset($credUser)) { echo 'value="' . clean($credUser) . '"'; } ?>>
				</section>

				<section class="input_box">
					Contraseña:
					<br>
					<input <?php if ($password_red) { echo 'class="wrong"'; } ?> placeholder="Contraseña" name="credentials_password" type="password">
				</section>

				<section class="input_box">

					<br>
					<input type="submit" value="Entrar">
					<br>
					<center><input name="login_remember_me" type="checkbox"> Recuérdame</center>
				</section>
			</form>
		</section>
	</header>

	<section class="main_wrapper">
		<section class="container">

			<section class="info_box">
				<div class="info_left_image">
					<img src="/web-gallery/images/bookshelf.png">
				</div>

				<div class="info_text">
					<div class="title">
						¡Bienvenido a la biblioteca!
					</div>
					<br>
					Si no te has registrado, puedes hacerlo haciendo click en el siguiente botón.

					<a href="/register">
						<button class="register_button">
							¡Regístrate!
						</button>
					</a>

					<div class="clear"></div>
				</div>
			</section>

		</section>
	</section>
	<?php include("inc/templates/footer.php"); ?>

</body>
</html>
