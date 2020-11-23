<?php
    require 'header.php';
    require 'navbar.php';

    use business\models\Ticket;
?>
 
<img class="movie-backdrop" src="https://image.tmdb.org/t/p/w1280<?= $movie->getBackdrop_path() ?>">
<main class="list-cinema">
    <h2><?= $movie->getTitle() ?></h2>
    <p class="movie-overview"><?= $movie->getOverview() ?></p>
    <h3>Funciones</h3>
    <br>
    <?php
        if (isset($showArrays) && isset($cinemas)) { 
            foreach ($cinemas as $cinema) {
                echo '<h4>'.$cinema->getName().'</h4><hr>';
                echo '<div class="show-list">';

                foreach($showArrays as $show) {
                    if ($show->getRoom()->getIdCinema() == $cinema->getId()) {
                        if ($show->getDate() >= date('Y-m-d')) {
                            if($show->getMovie()->getId() == $movie->getId()){
    ?>                    
                            <div class="show-card">
                                <h4 class="show-info">Sala: <?= $show->getRoom()->getName()?></p>     
                                <h5 class="show-info"><?= $show->getTime()?></h5>
                                <h5 class="show-info"><?= $show->getDate()?></h5>
                                <h5 class="show-price">$<?= $show->getRoom()->getPrice()?></h5>
                                <h5 class="show-info">
                                <?php 
                                    if ($_SESSION['user']->isAdmin()) {
                                        echo 'Vendidos: '.Ticket::amountFromShow($tickets, $show->getId()) .'/'. $show->getRoom()->getCapacity();
                                    }
                                ?>
                                </h5>
                                <h5 class="show-info">
                                <?php

                                    if ($_SESSION['user']->isAdmin()) {
                                        echo 'Total: $'.Ticket::amountFromShow($tickets, $show->getId()) * $show->getRoom()->getPrice();
                                    }

                                ?>
                                </h5>
                                <form action="<?= ROOT_CLIENT?>Buy/buyTicket" method="POST">
                                    <input type="hidden" name="idShow" value="<?= $show->getId()?>">
                                    <button class="cinema-delete-btn" type="submit">Comprar</button>
                                </form>
                            </div>
    <?php
                            }
                        }
                    }
                }
                echo '</div>';
            }   
        }
    ?>
</main>

<?php
    require 'footer.php';
?>