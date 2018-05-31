<?php
if (!defined("UBER")) exit;
$pages = array(
  "Inicio" => "me",
  "Eventos" => "events",
  "Salas" => "rooms"
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
        echo "href=\"/$link\">";
        echo $page;
        echo '</a></li>';
      }
       ?>
       <li class="rightside logout"><a href="/logout">Salir</a></li>
       <?php if (LOGGED_IN && $myrow["rank"]>'1'): ?>
       <li class="rightside"><a href="/manage">Administrar</a></li>
     <?php endif; ?>
    </ul>
  </section>
</nav>
