<?php
define('PAGE_ID', "me");
require_once "global.php";

if (!LOGGED_IN)
{
	header("Location: " . WWW . "/");
	exit;
}

$page_title = "Biblioteca - " . $myrow["username"] ;

$news_query = dbquery("SELECT id, title, shortstory, image, seo FROM inn_news ORDER BY published DESC LIMIT 2");
$news_available = mysqli_num_rows($news_query) > 0;

include("inc/templates/subheader.php");
?>
<body>

	<?php include("inc/templates/header.php"); ?>

	<?php include("inc/templates/navigator.php"); ?>

	<section class="main_wrapper">
		<section class="container">
			<section class="left_column me">
				<section class="info_box user">
					<section class="overlay">

					</section>
					<section class="user_info">

						<section class="user_name">
							<?php echo USER_NAME; ?>
						</section>

						<section class="user_motto">
							
						</section>

						<button onclick="window.open('/client', 'Inn', 'width=980,height=600,location=no,status=no,menubar=no,directories=no,toolbar=no,resizable=no,scrollbars=no'); return false;">
							Entrar al hotel
						</button>
					</section>

				</section>
			</section>

			<section class="right_column me">
				<section class="info_box radio_box centered">
					<div class="info_title">Radio</div>
					<br>

					<div id="radio_player">

					</div>

					<br>

					<div id="radio_info" class="small_text">
						<i class="fa fa-circle-o-notch fa-spin"></i>
					</div>

				</section>
			</section>

			<section class="clear"></section>

			<?php
			if ($news_available) {
			 ?>
			<section class="info_box">
				<div class="info_title blue">Últimas noticias</div>

				<?php
				while ($news = mysqli_fetch_assoc($news_query))
				{
				?>
				<div class="article_preview">
					<img class="info_left_image" src="<?php echo clean($news["image"]); ?>">
					<div class="info_text">
						<div class="title">
							<?php echo clean($news["title"]); ?>
						</div>
						<br>
						<?php echo clean($news["shortstory"]); ?>
						<br>
						<br>
						<a href="<?php echo '/articles/' . clean($news["id"]) . '-' . clean($news["seo"]); ?>">Leer más.</a>
						<div class="clear"></div>
					</div>
				</div>
				<?php } ?>

			</section>
			<?php } ?>

		</section>
	</section>

	<?php include("inc/templates/footer.php"); ?>

	<link rel="stylesheet" type="text/css" href="//maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css" />
	<link href="/web-gallery/css/radio.css" rel="stylesheet">
	<script src="//code.jquery.com/jquery-1.12.0.min.js"></script>
	<script>
	function checkRadio()
	{
		$.ajax({
			type: "GET",
			url: "/ajax/radio_info.php",
			success: function (msg) {
		  jQuery("#radio_info").html(msg);
		}});
		$.ajax({
			type: "GET",
			url: "/ajax/radio_timestamp.php",
			success: function (msg) {
			if (msg == "update")
			{
				updateRadio();
			}
		}});
	}
	function updateRadio()
	{
		$.ajax({
		type: "GET",
		url: "/ajax/radio_player.php",
		success: function (msg) {
			jQuery("#radio_player").html(msg);
		}});
	}
	setInterval(checkRadio, 10000);
	updateRadio();
	</script>
</body>
</html>
