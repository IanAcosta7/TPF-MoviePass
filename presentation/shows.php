<?php
    require 'header.php';
    require 'navbar.php';
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
                    if($id == $show->getMovie()->getId()){
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

                                    if ($_SESSION['user']->isAdmin) {
                                        echo $tickets->amountFromShow($show->getId()) * $show->getRoom()->getPrice();
                                    }

                                ?>
                                </h5>
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