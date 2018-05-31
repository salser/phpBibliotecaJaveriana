<?php if (!defined("UBER")) exit;

if (isset($_POST["badge_code"]) && isset($_POST["badge_name"]) && isset($_POST["badge_desc"]))
{
  $badge_code = filter($_POST["badge_code"]);
  $badge_name = filter($_POST["badge_name"]);
  $badge_desc = filter($_POST["badge_desc"]);

  if (strlen($badge_code) > 0 || strlen($badge_code) > 0 || strlen($badge_code) > 0)
  {
    dbquery("REPLACE INTO external_texts (skey, sval) VALUES ('badge_name_$badge_code', '$badge_name')");
    dbquery("REPLACE INTO external_texts (skey, sval) VALUES ('badge_desc_$badge_code', '$badge_desc')");
    if (isset($_POST["update"]))
    {
      alert("orange", "Cambios guardados");
    }
    else {
      alert("orange", "Descripción añadida");
    }
  }
  else {
    alert("red", "Rellena todos los datos");
  }
}
if (isset($_POST["remove"]))
{
  $badge_code = filter($_POST["remove"]);
  dbquery("DELETE FROM external_texts WHERE skey = 'badge_name_$badge_code' OR skey = 'badge_desc_$badge_code'");
  alert("orange", "Descripción retirada");
}

$external_texts_query = dbquery("SELECT skey, sval FROM external_texts WHERE skey LIKE '%badge_name_%'");
$external_texts_available = mysqli_num_rows($external_texts_query) > 0;
?>
<div class="info_title green">Nombres de placas</div>
<?php show_alerts(); ?>
<script>
function show_new_badge(el)
{
  if (el == "")
  {
    document.getElementById("new_badge_image").innerHTML ='?';
  }
  else {
    document.getElementById("new_badge_image").innerHTML ='<img src="<?php echo '//' . BADGE_IMAGER ?>' + el + '.gif">';
  }
}
</script>
<p>Herramienta para editar los nombres y descripciones de las placas del hotel.</p>
<table class="centered">
  <tr>
    <td>Placa</td>
    <td>Código</td>
    <td>Nombre</td>
    <td>Descripción</td>
    <td>Edición</td>
  </tr>
  <?php while ($external_texts_available && $text = mysqli_fetch_assoc($external_texts_query)) {
    $badge_code = substr($text['skey'], 11);
    $badge_name = $text['sval'];
    $badge_desc = dbqueryEvaluate("SELECT sval FROM external_texts WHERE skey = 'badge_desc_" . filter($badge_code) . "' LIMIT 1");

    echo '<tr>';
    echo '<td><img src="';
    echo '//' . BADGE_IMAGER . $badge_code . '.gif';
    echo '"></td>';
    echo '<td>' . $badge_code . '</td>';
    echo '<form method="post"><input type="hidden" name="badge_code" value="' . clean($badge_code) . '">';
    echo '<td class="input_box"><input type="text" name="badge_name" value="' . clean($badge_name) . '"></td>';
    echo '<td class="input_box"><input type="text" name="badge_desc" value="' . clean($badge_desc) . '"></td>';
    echo '<td>
    <div class="input_box" method="post"><input type="hidden" value="'.$badge_code.'" name="update"><input type="submit" class="inline" value="Editar"></div></form>
    <div class="input_box red"><form method="post"><input type="hidden" name="remove" value="'.$badge_code.'"><input type="submit" class="inline" value="Quitar"></form></div>
    </td>';
    echo '</tr>';
  } ?>
  <tr>
    <form method="post">
      <td class="input_box" id="new_badge_image">?</td>
      <td class="input_box"><input onkeyup="show_new_badge(this.value);" type="text" name="badge_code" placeholder="Código"></td>
      <td class="input_box"><input type="text" name="badge_name" placeholder="Nombre"></td>
      <td class="input_box"><input type="text" name="badge_desc" placeholder="Descripción"></td>
      <td class="input_box"><input type="submit" class="inline" value="Agregar"></td>
    </form>
  </tr>
</table>
