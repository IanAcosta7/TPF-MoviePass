<?php 
    require_once("header.php");
    require_once("navbar.php");
?>

<main class="error">
    <div class="error-msg">
        <?php
            if (get_class($e) == "business\\exceptions\\WebsiteException") {
        ?>
        <h2 class="error-number"> <?php echo $e->getErrorNumber(); ?> </h2>
        <p class="error-desc"> <?php echo $e->getMessage(); ?> </p>
        <?php 
            } else {
                throw $e;
            }
        ?>
    </div>
</main>

<?php
    require_once("footer.php");
?>