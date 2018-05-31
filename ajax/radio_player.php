<?php
define('PAGE_ID', "ajax_radio_player");
require_once "../global.php";
?><script src="/web-gallery/js/radio.js"></script>
<div class="radiocontrols">
  <div class="ico-stop"><i class="fa fa-pause" aria-hidden="true"></i></div>
  <div class="ico-play"><i class="fa fa-play" aria-hidden="true"></i></div>
  <div class="ico-sound"><i class="fa fa-volume-up" aria-hidden="true"></i></div>
  <input type="range" min="0" max="1" value="0.5" step="0.1" id="volumen">
</div>
<audio id="rs-off" autoplay="" src="
<?php
if (isset($_SESSION["radio_is_auto"]) && $_SESSION["radio_is_auto"] == false)
{
  echo 'http://game.showcard.org:8000/play.mp3';
}
else
{
  echo 'http://radio.loes.es:9996/;';
}
 ?>
"></audio>
