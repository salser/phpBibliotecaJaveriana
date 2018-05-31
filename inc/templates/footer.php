<?php if (!defined("UBER")) exit; ?>
<section id="footer">
  Todos los derechos reservados a su(s) respectivo(s) dueño(s).
</section>
<?php
$executionTime = microtime(true) - $core->execStart;
$numQueries = $db->numQueries;
echo "<!-- Generated in: $executionTime, with $numQueries queries -->";
?>
