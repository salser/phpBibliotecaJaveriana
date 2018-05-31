<?php if (!defined("UBER")) exit;

?>
<div class="info_title green">Direcciones IP / Clones</div>
<?php show_alerts(); ?>

<p>Puedes buscar los usuarios relacionados a una misma dirección IP, o revisar los clones de algún usuario.</p>

<form method="get">
  <input type="hidden" name="id" value="iptool">
  <section class="input_box">
    Nombre:
      <input placeholder="Nombre" name="user" type="text">
  </section>
  <section class="input_box">
      <input type="submit" value="Buscar nombre">
  </section>
</form>
<br><br>
<form method="get">
  <input type="hidden" name="id" value="iptool">
  <section class="input_box">
    Dirección IP:
      <input placeholder="Dirección IP" name="ip" type="text">
  </section>
  <section class="input_box">
      <input type="submit" value="Buscar IP">
  </section>
</form>

<div class="clear"></div>
<br>

<?php

$ip = '';
if (isset($_GET['ip'])) 
{ 
	$ip = filter($_POST['ip']);
}

if (isset($_GET['user']))
{
	$user = filter($_GET['user']);
	$ip = dbqueryEvaluate("SELECT ip_current FROM users WHERE username = '" . $user . "' LIMIT 1");
	
	if ($ip != null)
	{
		echo '<p><b>' . $user . '</b> --> <b>' . $ip . '</b></p>';
	}
	else
	{
		echo '<p>No se ha encontrado a ' . clean($user) . '</p>';
	}
}

if (isset($ip) && strlen($ip) > 0)
{
	$get = dbquery("SELECT id, username, last_online, mail, online FROM users WHERE ip_current = '" . $ip . "' LIMIT 50");
	
	while ($user = mysqli_fetch_assoc($get))
	{
		echo '<p><b>' . clean($user['username']) . '</b> <small>(ID: ' . $user['id'] . ')</small><br><span style="font-weight: normal;">Última conexión: Hace ' . timeAgo($user['last_online']) . '<br>Email: ' . clean($user['mail']) . '<br />Estado: <b>' . (($user['online'] =="1") ? 'online!' : 'offline') . '</b></span></p>';
	}
}
?>