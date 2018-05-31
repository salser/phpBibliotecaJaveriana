<?php if (!defined("UBER")) exit;

if (isset($_GET["u"]))
{
  $username = filter($_GET["u"]);
  if (isset($_POST["give"])) {
    $new_badge_code = filter($_POST["give"]);
    if (strlen($new_badge_code) > 0)
    {
      dbquery("INSERT INTO users_badges (user_id, badge_code) VALUES ((SELECT id FROM users WHERE username = '$username'), '" . $new_badge_code . "');") or die("Error");
      alert("orange", "Placa $new_badge_code añadida a $username");
    } else {
      alert("red", "¡Placa inválida!");
    }
  }
  if (isset($_POST["take"])) {
    $remove_badge_code = filter($_POST["take"]);
    if (strlen($remove_badge_code) > 0)
    {
      dbquery("DELETE FROM users_badges WHERE user_id = (SELECT id FROM users WHERE username = '$username') AND badge_code= '" . $remove_badge_code . "'")  or die("Error");
      alert("orange", "Placa $remove_badge_code retirada a $username");
    } else {
      alert("red", "¡Placa inválida!");
    }
  }

  $badges_query = dbquery("SELECT badge_code, slot_id, sval as badge_name FROM users LEFT JOIN users_badges ON (users.id = users_badges.user_id) LEFT JOIN external_texts ON (skey = concat('badge_name_', badge_code)) WHERE username LIKE '$username'");
  $badges_available = mysqli_num_rows($badges_query) > 0;
  if (!$badges_available)
  {
    alert("red", "¡No se encontró a " . clean($username) . "!");
  }
}
?>
<div class="info_title green">Placas de usuarios</div>
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
<p>Herramienta para editar placas de usuarios.</p>

<?php
if (isset($badges_available) && $badges_available)
{
   ?>
   <div>Placas de: <?php echo $username; ?></div>
   <div><a href="<?php echo $hk_links_template; ?>badges">Volver</a></div>
   <table class="centered">
     <tr>
       <td>Imagen</td>
       <td>Código</td>
       <td>Nombre</td>
       <td>Estado</td>
       <td>Edición</td>
     </tr>

     <?php
     while ($badge = mysqli_fetch_assoc($badges_query))
     {
       if ($badge["badge_code"] != null)
       {
         echo '<tr><td><img src="';
         echo '//' . BADGE_IMAGER . $badge["badge_code"] . '.gif';
         echo '"></td>';
         echo '<td>'. $badge["badge_code"] .'</td>';
         if ($badge["badge_name"] == null)
         {
           echo '<td>'."<i class=\"small_text\">Sin nombre</i>".'</td>';
         } else {
           echo '<td>'.$badge["badge_name"].'</td>';
         }
         if ($badge["slot_id"] == 0)
         {
           echo '<td>No equipada</td>';
         } else {
           echo '<td>Equipada en espacio '. $badge["slot_id"] .'</td>';
         }
         echo '<td class="input_box red"><form method="post"><input type="hidden" value="'.$badge["badge_code"].'" name="take"><input type="submit" class="inline" value="Quitar"></form></td></tr>';
       }
     }
      ?>
      <tr>
        <td id="new_badge_image">?</td>
        <form method="post">
          <td class="input_box"><input name="give" onkeyup="show_new_badge(this.value);" class="inline" type="text" placeholder="Nueva placa"></td>
          <td class="small_text">Nueva placa</td>
          <td>-</td>
          <td class="input_box"><input type="submit" class="inline" value="Dar"></td>
        </form>
      </tr>
   </table>
   <?php
} else { ?>
<form method="get">
  <input type="hidden" name="id" value="badges">
  <section class="input_box">
    Nombre:
      <input placeholder="Nombre" name="u" type="text">
  </section>
  <section class="input_box">
      <input type="submit" value="Ir">
  </section>
</form>
<?php } ?>
