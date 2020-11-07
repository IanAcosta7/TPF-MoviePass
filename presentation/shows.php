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
                        $cinemas = $this->CinemaDAO->getCinemaById($show->getIdCinema());
    ?>                    
                            <div class="cinema-card">
                                <h4 class="cinema-info"><?= $cinemas->getName()?></p>     
                                <p class="cinema-info"><?= $cinemas->getAddress()?></p>     
                                <h5 class="cinema-info"><?= $show->getDate()?></h4>
                                <h5 class="cinema-info"><?= $show->getTime()?></h4>
                                <h5 class="cinema-info">Valor del ticket: <?= $show->getTicketValue()?></h4>
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