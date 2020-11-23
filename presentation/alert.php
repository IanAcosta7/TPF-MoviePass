<?php 
    require_once("header.php");
    require_once("navbar.php");
?>

<main class="alert">
    <div class="alert-card">
        <p class="alert-msg"><?=$alertMessage?></p>
        
        <button class="alert-btn">
            <a class="btn-link" href="<?=ROOT_CLIENT.$redirectUrl?>">Continuar</a>
        </button>
    </div>
</main>

<?php
    require_once("footer.php");
?>