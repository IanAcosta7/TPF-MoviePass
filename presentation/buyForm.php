<?php
    require_once("header.php");
    require_once("navbar.php");
?>

    <form method= "POST">       
        <!-- agregar cine y sala -->
        <h5 class="cinema-info"><?= $show->getDate()?></h4>
        <h5 class="cinema-info"><?= $show->getTime()?></h4>
        <h5 class="cinema-info">Valor del ticket: <?= $show->getRoom()->getPrice()?></h4>

        <?php
            foreach ($credit_accounts as $acc) {
                echo '
                    <input type="hidden" name="'. $show->getId() .'" value="'. $show->getId() .'">
                    <input type="radio" id="'. $acc->getId() .'" name="card" value="'. $show->getName() .'">
                ';
            }
        ?>
        <label for="quantity">Cantidad de entradas</label>
        <input type="number" name="quantity" required>
        <label for="cred_acc">Numero de tarjeta</label>
        <input type="number" name="cred_acc" required>


        <button type="submit">Enviar</button>
        <button type="reset">Borrar</button>
    </form>

<?php
    require_once("footer.php");
?>