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
        if (isset($showArrays)) {    
            foreach($showArrays as $show)
            {
                if ($show->getDate() >= date('Y-m-d')) {
                    if($show->getMovie()->getId() == $movie->getId()){
    ?>                    
                            <div class="cinema-card">
                                <h4 class="cinema-info"><?= $show->getRoom()->getName()?></p>     
                                <h5 class="cinema-info"><?= $show->getDate()?></h5>
                                <h5 class="cinema-info"><?= $show->getTime()?></h5>
                                <h5 class="cinema-info">Valor del ticket: <?= $show->getRoom()->getPrice()?></h5>
                                <h5>
                                <?php 
                                    if ($_SESSION['user']->isAdmin()) {
                                        echo Ticket::amountFromShow($tickets, $show->getId()) .'/'. $show->getRoom()->getCapacity();
                                    }
                                ?>
                                </h5>
                                <h5>
                                <?php

                                    if ($_SESSION['user']->isAdmin()) {
                                        echo Ticket::amountFromShow($tickets, $show->getId()) * $show->getRoom()->getPrice();
                                    }

                                ?>
                                </h5>
                                <form action="<?= ROOT_CLIENT?>buy/buyTicket" method="POST">
                                    <input type="hidden" name="idShow" value="<?= $show->getId()?>">
                                    <button class="cinema-delete-btn" type="submit">Comprar</button>
                                </form>
                            </div>
    <?php
                    }
                }
            }
        }
    ?>
</main>

<?php
    require 'footer.php';
?>