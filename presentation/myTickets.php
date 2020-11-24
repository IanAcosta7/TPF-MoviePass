<?php
    require 'header.php';
    require 'navbar.php';
?>

    <main class="tickets">
        <h2 class='ticket-title'>Mis Tickets</h2>
        <?php
            if (empty($tickets))
                echo '<span class="ticket-empty">¡Lo sentimos!<br>Aún no has comprado tickets.</span>';

            foreach ($purchases as $purchase) {
                echo '<h3>Compra ID: '.$purchase->getId().'</h3>';
                unset($show);

                for ($i = 0; $i < count($tickets) && !isset($show); $i++) {
                    if ($tickets[$i]->getPurchase()->getId() == $purchase->getId())
                        $show = $shows[$tickets[$i]->getId_show()];
                }

                $ticketMovie = $movies[$show->getMovie()];
        ?>
                <h3><?= $ticketMovie->getTitle() ?></h3>
                <br>
                <table class="ticket-table">
                    <tr>
                        <th>Sala:</th>
                        <td><?=$show->getRoom()->getName()?></td>
                    </tr>
                    <tr>
                        <th>Hora:</th>
                        <td><?=$show->getTime()?></td>
                    </tr>
                    <tr>
                        <th>Fecha:</th>
                        <td><?=$show->getDate()?></td>
                    </tr>
                    <tr>
                        <th>Fecha de compra:</th>
                        <td><?=$purchase->getDate()?></td>
                    </tr>
                    <tr>
                        <th>Descuento:</th>
                        <td><?=$ticket->getPurchase()->getDiscount()?>%</td>
                    </tr>
                    <tr>
                        <th>Importe unitario:</th>
                        <td>$<?=$show->getRoom()->getPrice()?></td>
                    </tr>
                    <tr>
                        <th>Importe total:</th>
                        <td><b>$<?=$purchase->getTotal()?></b></td>
                    </tr>
                </table>

                <br>

                <div class="ticket-list">
        <?php
                foreach ($tickets as $ticket) {
                    if ($ticket->getPurchase()->getId() == $purchase->getId()) {
        ?>
                        <div class="ticket-card">
                            <small class="ticket-id">ID: <?= $ticket->getPurchase()->getId() . '-' . $ticket->getId() ?></small>
                            <img class="ticket-qr" src="https://api.qrserver.com/v1/create-qr-code/?size=150x150&data=<?= $ticket->getQr() ?>" alt="">
                        </div>
        <?php
                    }
                }
                echo '</div><br><hr><br>';
            }
        ?>
    </main>

<?php
    require 'footer.php';
?>