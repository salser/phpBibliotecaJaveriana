<?php if (!defined("UBER")) exit;
if (isset($_GET["delete"]))
{
  alert("red", "Borrar noticias está desactivado. Contactar a los administradores");
}
$news_query = dbquery("SELECT id, title, shortstory, published, seo FROM inn_news ORDER BY published DESC");
$news_available = mysqli_num_rows($news_query) > 0;
?>
<div class="info_title green">Administrar noticias</div>
<?php show_alerts(); ?>
<p>Noticias actualmente publicadas:</p>
<?php
if ($news_available)
{
?>
<table class="centered">
<tr>
	<td>ID</td >
	<td>Título</td>
	<td>Resumen</td>
	<td>Fecha</td>
	<td>Edición</td>
</tr>
<?php
  while ($news = mysqli_fetch_assoc($news_query))
  {
    echo '<tr>';
    echo '<td>' . $news["id"] . '</td>';
    echo '<td>' . $news["title"] . '</td>';
    echo '<td>' . $news["shortstory"] . '</td>';
    echo '<td>' . strftime("%B %d de %Y a las %I:%M %p", $news["published"]) . '</td>';
    echo '<td>' .'
    <a target="_blank" href="/articles/' . $news["id"] . "-" . $news["seo"] . '">Ver</a><br>
    <a href="' . $hk_links_template . "newsedit&u=" . $news["id"] . '">Editar</a><br>
    <a href="' . $hk_links_template . "news&delete=" . $news["id"] . '">Borrar</a><br>';
    echo '<tr>';
  }
 ?>
</table>
<?php } else { ?>
  No hay noticias.
<?php } ?>
