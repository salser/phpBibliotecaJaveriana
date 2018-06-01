<?php if (!defined("UBER")) exit; ?>
<section id="footer">
  Copyright &copy; 2018 PutoElQueLoLea - Todos los derechos reservados a su(s) respectivo(s) dueño(s).
</section>
<?php
$executionTime = microtime(true) - $core->execStart;
$numQueries = $db->numQueries;
echo "<!-- Generated in: $executionTime, with $numQueries queries -->";
?>
