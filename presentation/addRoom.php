<?php
    require_once("header.php");
    require_once("navbar.php");
?>

    <form  class="card-form" method= "POST"> 
        <input type="hidden" name="id_cinema" value=<?= $id_cinema?> >
        <div class="card-left">
            <label for="name">Nombre</label>
        </div>
        <input class="card-input" type="text" name="name" required>
        <div class="card-left">
            <label for="capacity">Capacidad</label>
        </div>
        <input class="card-input" type="number" name="capacity" min="1" value="1" required>
        <div class="card-left">
            <label for="price">Precio</label>
        </div>
        <input class="card-input" type="number" name="price" min="0" required>

        <button type="submit">Enviar</button>
        <button type="reset">Borrar</button>
    </form>

<?php
    require_once("footer.php");
?>