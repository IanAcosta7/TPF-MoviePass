<nav class="navbar">  
    <div class="navbar-menu">
        <ul>
            <li><a href="<?= ROOT_CLIENT ?>Movie">Mostrar peliculas</a></li>
            <li><a href="<?= ROOT_CLIENT ?>">Carrito</a></li>
            
        </ul>
        <?php
            //if(Admin)
        ?>
        <ul>
            <li><a href="<?= ROOT_CLIENT ?>Cinema">Administrar Cines</a></li>
            <li><a href="<?= ROOT_CLIENT ?>Movie/showAddMovie">Agregar Función</a></li>
        </ul>
        <?php
            //}
        ?>
    </div>
    <div class="navbar-close">
        <a class="navbar-btn" href="">Cerrar Sesión</a>
    </div>
</nav>