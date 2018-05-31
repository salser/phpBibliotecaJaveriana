<?php
define('PAGE_ID', "articles");
require_once "global.php";

if (isset($_GET["id"]))
{
	$news_id = filter($_GET["id"]);
	if ($news_id != $_GET["id"])
	{
		header("Location: " . WWW . "/logout.php");
		exit;
	}
	$news_id = intval($news_id);
	$news_query = dbquery("SELECT title, shortstory, longstory, published, author FROM inn_news WHERE id = $news_id LIMIT 1");
	$news_available = mysqli_num_rows($news_query) == 1;
}

if (!isset($_GET["id"]) || !$news_available)
{
	$news_query = dbquery("SELECT title, shortstory, longstory, published, author FROM inn_news ORDER BY published DESC LIMIT 1");
	$news_available = mysqli_num_rows($news_query) == 1;
}

if (!$news_available)
{
	header("Location: " . WWW . "/");
	exit;
}
else
{
	$news = mysqli_fetch_assoc($news_query);
	$page_title = "Inn - " . clean($news["title"]);
}

$news_list_query = dbquery("SELECT id, title, shortstory, seo FROM inn_news ORDER BY published DESC LIMIT 5");
$news_list_available = mysqli_num_rows($news_list_query) > 0;

include("inc/templates/subheader.php");
?>
<body>

	<?php include("inc/templates/header.php"); ?>

	<?php include("inc/templates/navigator.php"); ?>

	<section class="main_wrapper">
		<section class="container">

			<section class="info_box">
				<div class="info_title blue">Noticias</div>

				<div class="article_preview">
					<div class="info_text">
						<div class="title">
							<?php echo clean($news["title"]); ?>
						</div>
						<br>
						<i><?php echo clean($news["shortstory"]); ?></i>
						<br>
						<br>
						<?php echo clean($news["longstory"], true); ?>
						<br>
						<br>

						<strong><?php echo clean($news["author"]); ?></strong>, Hotel Manager.
						<br>
						<br>

						<div class="small_text">Publicado en <i><?php echo strftime("%B %d de %Y a las %I:%M %p", $news["published"]); ?></i></div>

						<div class="clear"></div>
					</div>
				</div>

			</section>

			<?php
			if ($news_list_available)
			{
			?>
			<section class="info_box">
				<div class="info_title green">Más noticias</div>
				<ul>
					<?php
					while ($newsItem = mysqli_fetch_assoc($news_list_query))
					{
					?>
					<li>
						<a href="<?php echo '/articles/' . $newsItem["id"] . '-' . $newsItem["seo"]; ?>">
							<?php echo clean($newsItem["title"]); ?>
							<div class="small_text"><?php echo clean($newsItem["shortstory"]); ?></div>
						</a>
					</li>
					<?php } ?>
				</ul>
			</section>

			<?php } ?>
		</section>
	</section>
	<?php include("inc/templates/footer.php"); ?>
	<script src="//code.jquery.com/jquery-1.12.0.min.js"></script>
</body>
</html>
