<?php
    $navbarButtons = '
        <a class="navbar-btn menu-btn" href="'. ROOT_CLIENT .'Cinema">Volver</a>
    ';

    require_once("header.php");
    require_once("navbar.php");
?>

    <form method= "POST"> 
        <label for="capacity">Capacidad</label>
        <input type="number" name="capacity" required>
        <label for="name">Nombre</label>
        <input type="text" name="name" required>
        <label for="address">Direccion</label>
        <input type="text" name="address" required>

        <button type="submit">Enviar</button>
        <button type="reset">Borrar</button>
    </form>

<?php
    require_once("footer.php");
?>