<?php
define('PAGE_ID', "ajax_radio_timestamp");
require_once "../global.php";
if (isset($_SESSION["radio_needs_update"]) && $_SESSION["radio_needs_update"] == true || !isset($_SESSION["radio_needs_update"]))
{
  echo "update";
  $_SESSION["radio_needs_update"] = false;
  $_SESSION["radio_last_update"] = time();
}
else {
  echo "none";
} ?>
