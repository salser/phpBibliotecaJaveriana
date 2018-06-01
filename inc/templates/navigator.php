<?php
if (!defined("UBER")) exit;
$pages = array(
  "Inicio" => "me",
  "Eventos" => "eventos",
  "Salas" => "salas",
  "Equipos" => "equipos",
);

 ?><nav>
  <section class="container">
    <ul>
      <?php
      foreach ($pages as $page => $link)
      {
        echo "<li><a ";
        if (PAGE_ID == $link)
        {
          echo 'class="selected" ';
        }
        echo "href=\"/$link.php\">";
        echo $page;
        echo '</a></li>';
      }
       ?>
       <li class="rightside logout"><a href="/logout.php">Salir</a></li>
       <?php if (LOGGED_IN && $myrow["rank"]>'1'): ?>
       <li class="rightside"><a href="/manage">Administrar</a></li>
     <?php endif; ?>
    </ul>
  </section>
</nav>
