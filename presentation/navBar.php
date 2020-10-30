<nav class="navbar">  
    <div class="navbar-menu">
        <?php
            if (isset($navbarButtons))
                echo $navbarButtons;
        ?>
    </div>
    <div class="navbar-close">
        <a class="navbar-btn" href="">Cerrar Sesión</a>
    </div>
</nav>