<?php
define('PAGE_ID', "ajax_radio_info");
require_once "../global.php";

$look = $myrow["look"];

//$look = "hd-190-10.lg-3023-1408.ch-215-91.hr-893-45";
$dj_name = "Automático";
/*
$_SESSION["radio_is_auto"] = true;
$radio_info = mysqli_fetch_assoc(dbquery("SELECT inn_radio.current_id, inn_radio.stamp, users.username, users.look FROM inn_radio LEFT JOIN users ON (inn_radio.current_id = users.id) LIMIT 1"));
if (!isset($_SESSION["radio_last_update"]))
{
	$_SESSION["radio_last_update"] = 0;
	$_SESSION["radio_needs_update"] = false;
}
if ($radio_info["stamp"] > $_SESSION["radio_last_update"])
{
	$_SESSION["radio_needs_update"] = true;
}

if ($radio_info["look"] != null)
{
	$look = $radio_info["look"];
}
if ($radio_info["username"] != null)
{
	$dj_name = $radio_info["username"];
	$_SESSION["radio_is_auto"] = false;
}*/
?>
<img src="//<?php echo HABBO_IMAGER . $look ; ?>&size=s&direction=4">
<br>
DJ Actual: <?php echo $dj_name; ?>
<br>
Ahora suena:
<?php
/*

Now Playing PHP script for SHOUTcast

This script is (C) MixStream.net 2008

Feel free to modify this free script
in any other way to suit your needs.

Version: v1.1

*/


/* ----------- Server configuration ---------- */

$ip = "radio.loes.es";
$port = "9996";

/* ----- No need to edit below this line ----- */
/* ------------------------------------------- */
$fp = @fsockopen($ip,$port,$errno,$errstr,1);
if (!$fp)
	{
	echo "Connection refused"; // Diaplays when sever is offline
	}
	else
	{
	fputs($fp, "GET /7.html HTTP/1.0\r\nUser-Agent: Mozilla\r\n\r\n");
	while (!feof($fp))
		{
		$info = fgets($fp);
		}
	$info = str_replace('</body></html>', "", $info);
	$split = explode(',', $info);
	if (empty($split[6]) )
		{
		echo "No disponible"; // Diaplays when sever is online but no song title
		}
	else
		{
		$title = str_replace('\'', '`', $split[6]);
		$title = str_replace(',', ' ', $title);
		echo "$title"; // Diaplays song
		}
	}
?>
