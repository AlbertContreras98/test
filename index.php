<?php
require_once('routes/route.php');
require_once(CONFIG_PATH . '/database.php');

$database = new Database();

?>

<!-- HTML -->
<h1>¿Que quieres hacer?</h1>
<a href="app/views/portfolio/index.php">Ver mis Portfolios</a> <br>
<a href="app/views/portfolio/create.php">Crear Portfolios</a>