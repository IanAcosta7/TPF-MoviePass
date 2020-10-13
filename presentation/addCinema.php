<?php
require_once("header.php");
?>

    <form method= "GET"> 
        <label for="capacity">Capacidad</label>
        <input type="number" name="capacity" required>
        <label for="name">Nombre</label>
        <input type="text" name="name" required>
        <label for="address">Direccion</label>
        <input type="text" name="address" required>

        <button type="sumbit">Enviar</button>
        <button type="reset">Borrar</button>
    </form>

<?php
require_once("footer.php");
?>