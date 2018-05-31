<?php if (!defined("UBER")) exit;
if (isset($_POST['content']))
{
  $title = filter($_POST['title']);
  $teaser = filter($_POST['teaser']);
  $image = filter($_POST['image_url']);
  $content = $_POST['content'];
  $content_filtered = filter($_POST['content']);
  $author = filter($_POST['author']);
  $url = filter($_POST['url']);

  if (strlen($title) < 1 || strlen($teaser) < 1 || strlen($content) < 1 || strlen($image) < 1 || strlen($author) < 1 || strlen($url) < 1)
  {
    alert("red", "Por favor, rellena todos los datos");
  } else {
    alert("orange", "¡Noticia publicada!");

    dbquery("INSERT INTO inn_news (title, shortstory, longstory, published, image, author, seo) VALUES ('" . $title . "', '". $teaser ."', '" . $content_filtered ."', '". time() ."', '". $image ."', '" . $author ."', '". $url ."')");
    header("Location: " . $hk_links_template . "news");
    exit;
  }
}
?>
<script type="text/javascript">
function suggestSEO(el)
{
  var suggested = el;

  suggested = suggested.toLowerCase();
  suggested = suggested.replace(/^\s+/, '');
  suggested = suggested.replace(/\s+$/, '');
  suggested = suggested.replace(/[á]/g, 'a');
  suggested = suggested.replace(/[é]/g, 'e');
  suggested = suggested.replace(/[í]/g, 'i');
  suggested = suggested.replace(/[ó]/g, 'o');
  suggested = suggested.replace(/[ú]/g, 'u');
  suggested = suggested.replace(/[^a-z 0-9]+/g, '');

  while (suggested.indexOf(' ') > -1)
  {
    suggested = suggested.replace(' ', '-');
  }

  document.getElementById('news_url').value = suggested;
}
</script>
<div class="info_title green">Escribir una noticia</div>

<?php show_alerts(); ?>

<form method="post">

  <section class="input_box">
    Nombre de la noticia:
    <input onkeyup="suggestSEO(this.value);" placeholder="¡Habbos en la playa!" name="title" type="text" <?php if (isset($title)) { echo 'value="' . clean($title) . '"'; } ?>>
  </section>

  <section class="input_box">
    Resumen de la noticia:
    <textarea name="teaser" placeholder="¿Un descanso en plena fiesta? Con la exclusiva hamaca de sol incluida podrás. ¡Incluye también placa e interruptor!"><?php if (isset($teaser)) { echo clean($teaser); } ?></textarea>
  </section>

  <section class="input_box">
    Imagen (topstory):
    <input placeholder="http://images.habboinn.com/c_images/Top_Story_Images/topStory_merger_2.gif" name="image_url" <?php if (isset($image)) { echo 'value="' . clean($image) . '"'; } ?> type="text">
  </section>

  <section class="input_box">
    Contenido de la noticia:
    <textarea id="news_content" name="content"><?php if (isset($content)) { echo clean($content); } ?></textarea>
  </section>

  <section class="input_box">
    Autor:
    <input placeholder="Jose" name="author" type="text" <?php if (isset($author)) { echo 'value="' . clean($author) . '"'; } ?>>
  </section>

  <section class="input_box">
    URL:
    <input id="news_url" placeholder="habbos-en-la-playa" name="url" type="text" <?php if (isset($url)) { echo 'value="' . clean($url) . '"'; } ?>>
  </section>

  <section class="input_box">
    <input type="submit" value="Publicar">
  </section>
</form>
