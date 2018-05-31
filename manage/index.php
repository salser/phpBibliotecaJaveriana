<?php
define('PAGE_ID', "hk_index");
require_once "../global.php";

if (!LOGGED_IN || $myrow["rank_name"] == null)
{
	header("Location: " . WWW . "/");
	exit;
}

$page_title = "Inn - Housekeeping";
include("../inc/templates/subheader.php");

$hk_include_dir = "inc/";
$hk_links_template = "./?id=";
$current_page = "index";

if (isset($_GET["id"]))
{
	$current_page = filter($_GET["id"]);
}

if (!file_exists($hk_include_dir . $current_page . ".php"))
{
	$current_page = "index";
}

function alert($color, $message)
{
	$result_message = '<br><div class="info_title ' . clean($color) . '">' . clean($message) . '</div>';
	if (isset($_SESSION["hk_alert"]))
	{
		$_SESSION["hk_alert"] .= $result_message;
	} else {
		$_SESSION["hk_alert"] = $result_message;
	}
}

function show_alerts()
{
	if (isset($_SESSION["hk_alert"]))
	{
		echo $_SESSION["hk_alert"];
		unset($_SESSION["hk_alert"]);
	}
}

?>
<body class="housekeeping">
	<header>
		<section class="header_overlay">
			<section class="little_container">

				<section id="logo" class="boy">
					<a href="/manage" >habboinn</a>
				</section>

				<section class="connection_count">
					<?php echo clean($users->GetOnlineCount()); ?> Habbos conectados
				</section>

			</section>
		</section>
	</header>

	<nav>
		<section class="container">
			<ul>
				<li><a href="#" onclick="window.open('/client', 'Inn', 'width=980,height=600,location=no,status=no,menubar=no,directories=no,toolbar=no,resizable=no,scrollbars=no'); return false;">Entrar al hotel</a></li>
				<li class="rightside logout"><a href="/me">Volver</a></li>
			</ul>
		</section>
	</nav>

	<section class="main_wrapper">
		<section class="container">

			<section class="left_column">
				<section class="info_box">
					<?php
          include($hk_include_dir . $current_page . ".php"); ?>
					<div class="clear"></div>
				</section>
			</section>

			<section class="right_column">
				<section class="info_box">
					<?php include("navigator.php"); ?>
				</section>

			</section>
			<div class="clear"></div>
		</section>

	</section>
	<?php include("../inc/templates/footer.php"); ?>
	<script src="//cdn.tinymce.com/4/tinymce.min.js"></script>
	<script>tinymce.init({ selector:'#news_content' });</script>
</body>
</html>
