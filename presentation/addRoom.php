<?php
    require_once("header.php");
    require_once("navbar.php");
?>

    <form method= "POST"> 
        <h3>ROOM</h3>
        <input type="hidden" name="id_cinema" value=<?= $id_cinema?> >
        <label for="name">Nombre</label>
        <input type="text" name="name" required>
        <label for="capacity">Capacidad</label>
        <input type="number" name="capacity" required>
        <label for="price">Precio</label>
        <input type="number" name="price" required>

        <button type="submit">Enviar</button>
        <button type="reset">Borrar</button>
    </form>

<?php
    require_once("footer.php");
?>