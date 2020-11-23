<nav class="navbar">  
    <img class="navbar-logo" src="<?=ROOT_CLIENT?>presentation/png/movie-pass.png">
    <div class="navbar-menu">
        <div class="dropdown">
            <label class="dropdown-label">Opciones</label>
            <ul class="dropdown-options dropdown-menu">
                <li><a class="drop-option" href="<?= ROOT_CLIENT ?>Movie">Mostrar peliculas</a></li>
                <li><a class="drop-option" href="<?= ROOT_CLIENT ?>">Carrito</a></li>
            </ul>
        </div>
        <?php
            if($_SESSION["user"]->isAdmin()){
        ?>
        <div class="dropdown">
            <label class="dropdown-label">Administrador</label>
            <ul class="dropdown-options dropdown-admin">
                <li><a class="drop-option" href="<?= ROOT_CLIENT ?>Cinema">Administrar Cines</a></li>
                <li><a class="drop-option" href="<?= ROOT_CLIENT ?>Movie/showAddMovie">Agregar Función</a></li>
            </ul>
        </div>
        <?php
            }
        ?>
    </div>
    <div class="navbar-close">
        <a class="navbar-btn" href="<?= ROOT_CLIENT?>Home/logout">Cerrar Sesión</a>
    </div>
</nav>