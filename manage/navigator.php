<?php if (!defined("UBER")) exit; ?>
<div class="info_title orange">Inicio</div>
<ul>
	<li><a href="/manage">Página principal</a></li>
</ul>
<div class="info_title blue">Heramientas del hotel</div>
<ul>
	<li><a href="<?php echo $hk_links_template; ?>badges">Placas de usuarios</a></li>
	<li><a href="<?php echo $hk_links_template; ?>badgedefs">Nombres de placas</a></li>
</ul>

<div class="info_title blue">Usuarios y moderación</div>
<ul>
	<li><a href="<?php echo $hk_links_template; ?>bans">Baneos</a></li>
	<li><a href="<?php echo $hk_links_template; ?>iptool">Direcciones IP</a></li>
</ul>

<div class="info_title blue">Radio</div>
<ul>
	<li><a href="<?php echo $hk_links_template; ?>radio">Administrar radio</a></li>
</ul>

<div class="info_title blue">Noticias</div>
<ul>
	<li><a href="<?php echo $hk_links_template; ?>newspublish">Escribir una noticia</a></li>
	<li><a href="<?php echo $hk_links_template; ?>news">Administrar noticias</a></li>
</ul>

<div class="info_title blue">Catálogo</div>
<ul>
	<li><a href="<?php echo $hk_links_template; ?>furnifinder">Administrar catálogo</a></li>
</ul>

<center>
	<img src="//<?php echo HABBO_IMAGER . $myrow["look"] . "&size=m&direction=4&gesture=sml"; ?>">
	<div class="small_text"><?php echo USER_NAME; ?><br><?php echo $myrow["rank_name"]; ?><br><?php echo $core->GetIP(); ?></div>
</center>
