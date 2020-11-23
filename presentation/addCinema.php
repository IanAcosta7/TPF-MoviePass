<?php
    require_once("header.php");
    require_once("navbar.php");
?>

    <form class="card-form" method= "POST"> 
        <h3>Nueva Sala</h3>
        <br>
        <div class="card-left">
            <h4 for="name">Nombre</h4>
        </div>
        <input class="card-input" type="text" name="name" required>
        
        <div class="card-left">
            <h4 for="address">Direccion</h4>
        </div>
        <input class="card-input" type="text" name="address" required>
        
        <div class="card-left">
            <h4 for="capacity">Capacidad</h4>
        </div>
        <input class="card-input" type="number" name="capacity" min="1" value="1" required>

        <button type="submit">Enviar</button>
        <button type="button"><a class="btn-link" href="<?=ROOT_CLIENT?>Cinema">Cancelar</a></button>
    </form>

<?php
    require_once("footer.php");
?>