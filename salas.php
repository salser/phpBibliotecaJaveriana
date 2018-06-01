<?php
define('PAGE_ID', "salas");
require_once "global.php";

$page_title = "Inn - Equipo Administrativo";

//$staffs_query = dbquery("SELECT users.id, users.username, users.motto, users.rank, users.last_online, users.online, users.look, users_badges.badge_code, inn_ranks.name as rank_name, inn_ranks.side, inn_ranks.color FROM users JOIN inn_ranks ON (users.rank = inn_ranks.id) LEFT JOIN users_badges ON (users.id = users_badges.user_id AND slot_id > 0) ORDER BY rank DESC, id ASC");
$last_rank_name = "";
$last_user_name = "";
$last_side = "l";
$staffs_available = 0;

$rankOpened = false;
$userOpened = false;

include("inc/templates/subheader.php");
?>
<body>
	<?php include("inc/templates/header.php"); ?>

	<?php include("inc/templates/navigator.php"); ?>

	<section class="main_wrapper">
		<section class="container">
			<?php if (!$staffs_available) { ?>
				<section class="left_column">
					<section class="info_box">
						<div class="info_title blue">No hay miembros de la administración para mostrar.</div>
					</section>
				</section>
				<section class="right_column">
					<section class="info_box">
						<div class="info_title green">No hay miembros de la administración para mostrar.</div>
					</section>
				</section>
			<?php } else {

				echo '<section class="left_column">';
				while ($staff = mysqli_fetch_assoc($staffs_query))
				{
						if ($last_side != $staff["side"])
						{
							if ($userOpened)
							{
								echo '</section> <!-- close user -->';
								$userOpened = false;
							}
							if ($rankOpened)
							{
								echo '</section> <!-- close rank -->';
								$rankOpened = false;
							}

							echo '</section> <!-- close side -->';

							echo '<section class="right_column"> <!-- open side -->';
						}

						if ($last_rank_name != $staff["rank_name"])
						{
							if ($userOpened)
							{
								echo '</section> <!-- close user -->';
								$userOpened = false;
							}
							if ($rankOpened)
							{
								echo '</section> <!-- close rank -->';
								$rankOpened = false;
							}

							echo '<section class="info_box"> <!-- open rank -->';
							echo '<div class="info_title ' . $staff["color"] . '">' . $staff["rank_name"] .'</div>';
							$rankOpened = true;
						}

						if ($last_user_name != $staff["username"])
						{
							if ($userOpened)
							{
								echo '</section> <!-- close user -->';
								$userOpened = false;
							}
							echo '<section class="user_staff_info"> <!-- open user -->';
							echo '<img class="avatar" align="left" src="//' . HABBO_IMAGER . $staff["look"] . '&size=m&direction=2&gesture=sml">';
							echo '<div class="title">';
							echo $staff["username"];
							echo '</div>';

							echo '<div class="small_text">';
							echo $staff["motto"];
							echo '</div>';

							echo '<div class="right">';
							if ($staff["online"] == 1)
							{
								echo '<img src="/web-gallery/images/habbo_online_anim_big.gif">';
							}	else {
								echo '<img src="/web-gallery/images/habbo_offline_big.gif">';
							}
							echo '<div class="small_text">';
							echo '<div class="small_text clear">Última conexión: <i>Hace ' . timeAgo($staff["last_online"] - 18000) . '.</i></div>';
							echo '</div>';
							echo '</div>';
							$userOpened = true;
						}

						if ($staff["badge_code"] != null)
						{
							echo '<img src="';
							echo '//' . BADGE_IMAGER . $staff["badge_code"] . '.gif';
							echo '">';
						}

						$last_rank_name = $staff["rank_name"];
						$last_user_name = $staff["username"];
						$last_side = $staff["side"];
				}
				if ($userOpened)
				{
					echo '</section> <!-- close user -->';
					$userOpened = false;
				}

				if ($rankOpened)
				{
					echo '</section> <!-- close rank -->';
					$rankOpened = false;
				}
				echo '</section> <!-- close side -->';

				?>
			<?php } ?>
			<div class="clear"></div>

		</section>
	</section>
	<?php include("inc/templates/footer.php"); ?>
</body>
</html>
