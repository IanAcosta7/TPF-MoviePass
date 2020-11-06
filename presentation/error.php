<?php namespace presentation;

require_once("header.php");
require_once("navbar.php");
?>
<main>
    <h2> <?php echo $e->getErrorNumber(); ?> </h2>
    <p> <?php echo $e->getErrorMessage(); ?> </p>
</main>