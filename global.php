<?php
// ############################################################################
// Prepare the local environment
define('UBER', true);
define('DS', DIRECTORY_SEPARATOR);
define('LB', chr(13));
define('CWD', dirname(__FILE__) . DS);
define('INCLUDES', CWD . 'inc' . DS);
define('SITE_NAME', "Showcard");

date_default_timezone_set('America/Bogota');
setlocale(LC_TIME, "Spanish_Colombia");

error_reporting(E_ALL);
@session_start();

// ############################################################################
// Initialize core classes
require_once INCLUDES . "class.core.php";
require_once INCLUDES . "class.db.mysql.php";
require_once INCLUDES . "class.users.php";
require_once INCLUDES . "mail.php";

$core = new uberCore();
$users = new uberUsers();

// ############################################################################
// Execute some required core functionality

$core->ParseConfig();
$db = new MySQL($core->config['MySQL']['hostname'], $core->config['MySQL']['username'],	$core->config['MySQL']['password'], $core->config['MySQL']['database']);
$db->Connect();

// ############################################################################
// Session handling

if (isset($_SESSION['UBER_USER_E']) && isset($_SESSION['UBER_USER_H']))
{
	$userE = $_SESSION['UBER_USER_E'];
	$userH = $_SESSION['UBER_USER_H'];

	$usersql = dbquery("SELECT * FROM users WHERE username = '" . $userE . "' AND password = '" . $userH . "' LIMIT 1");
	$myrow = mysqli_fetch_assoc($usersql);
	if (mysqli_num_rows($usersql) > 0)
	{
		define('LOGGED_IN', true);
		define('USER_NAME', $userE);
		define('USER_ID', $myrow["id"]);
		define('USER_HASH', $userH);
	}
	else
	{
		@session_destroy();
		header('Location: /');
		exit;
	}
}
else
{
	define('LOGGED_IN', false);
	define('USER_NAME', '');
	define('USER_ID', -1);
	define('USER_HASH', null);
}

$core->CheckCookies();
checkCron();

function dbquery($strQuery = '')
{
	global $db;

	if($db->IsConnected())
	{
		return $db->DoQuery($strQuery);
	}

	return $db->Error('Could not process query, no active db connection detected..');
}

function dbqueryEvaluate($strQuery, $i = 0)
{
	global $db;
	if($db->IsConnected())
	{
		return $db->Evaluate($strQuery, $i);
	}

	return $db->Error('Could not process query, no active db connection detected..');
}

function filter($strInput = '')
{
	global $db;
	return mysqli_real_escape_string($db->link, trim($strInput));
	//return mysqli_real_escape_string($db->link, stripslashes(trim($strInput)));
}
function clean($strInput = '', $ignoreHtml = false, $nl2br = false, $encoding = "UTF-8")
{
	$strInput = stripslashes(trim($strInput));
	if (!$ignoreHtml)
	{
		$strInput = htmlentities($strInput, ENT_COMPAT | ENT_HTML401, $encoding);
	}
	if ($nl2br)
	{
		$strInput = nl2br($strInput);
	}
	return $strInput;
}

function checkCron() {

}
?>
