<?php
    require_once("header.php");
    require_once("navbar.php");
?>

    <form method= "POST">       
        <!-- agregar cine y sala -->
        <h5 class="cinema-info"><?= $show->getDate()?></h4>
        <h5 class="cinema-info"><?= $show->getTime()?></h4>
        <h5 class="cinema-info">Valor del ticket: <?= $show->getTicketValue()?></h4>

        <input type="hidden" name="idShow" value=" <?= $idShow ?>">
        <input type="radio" id="visa" name="card" value="visa">
        <label for="card">visa</label><br>
        <input type="radio" id="mastercard" name="card" value="mastercard">
        <label for="card">Master Card</label><br>
        <input type="radio" id="naranja" name="card" value="naranja">
        <label for="card">visa</label><br>
        <label for="quantity">Cantidad de entradas</label>
        <input type="number" name="quantity" required>

        <button type="submit">Enviar</button>
        <button type="reset">Borrar</button>
    </form>

<?php
    require_once("footer.php");
?>