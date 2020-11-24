<?php
    require_once("header.php");
    require_once("navbar.php");
?>

    <form class="card-form" method= "POST">       
        <!-- agregar cine y sala -->
        <div class="card-left card-label">
            <h4>Información de la compra</h4>
        </div>
        <table class="card-info-table">
            <tr>
                <th>Película:</th>
                <td><?= $movie->getTitle() ?></td>
            </tr>
            <tr>
                <th>Cine:</th>
                <td><?= $cinema->getName() ?></td>
            </tr>
            <tr>
                <th>Sala:</th>
                <td><?= $show->getRoom()->getName() ?></td>
            </tr>
            <tr>
                <th>Fecha:</th>
                <td><?= $show->getDate() ?></td>
            </tr>
            <tr>
                <th>Hora:</th>
                <td><?= $show->getTime() ?></td>
            </tr>
            <tr>
                <th>Precio unitario:</th>
                <td>$<?= $show->getRoom()->getPrice() ?></td>
            </tr>
        </table>

        <div class="card-left card-label">
            <h4>Tipo de tarjeta</h4>
        </div>
        <?php
            $flag = 'checked="true"';
            foreach ($credit_accounts as $acc) {
                echo '
                    <div class="card-input card-left"card-label>
                        <input type="hidden" name="show_id" value="'. $show->getId() .'">
                        <input type="radio" '. $flag .' name="card" value="'. $acc->getId() .'" required> '. $acc->getCompany() .'
                    </div>
                ';
                $flag = '';
            }
        ?>

        <div class="card-left"card-label>
            <h4  for="card-number">Numero de tarjeta</h4>
        </div>
        <input class="card-input"  type="text" name="card-number" id="card-number" placeholder="0000-0000-0000-0000" required>

        <div class="card-left"card-label>
            <h4  for="sec-code">Código de Seguridad</h4>
        </div>
        <input class="card-input"  type="text" name="sec-code" id="sec-code" placeholder="000" required>

        <div class="card-left"card-label>
            <h4  for="quantity">Cantidad de entradas</h4>
        </div>
        <input class="card-input" type="number" name="quantity" min="1" value="1" required>


        <button type="submit">Enviar</button>
        <button type="reset">Borrar</button>
    </form>

<?php
    require_once("footer.php");
?>