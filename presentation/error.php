<?php namespace presentation;

require_once("header.php");
require_once("navbar.php");
?>
<main class="error">
    <div class="error-msg">
        <h2 class="error-number"> <?php echo $e->getErrorNumber(); ?> </h2>
        <p class="error-desc"> <?php echo $e->getMessage(); ?> </p>
    </div>
</main>