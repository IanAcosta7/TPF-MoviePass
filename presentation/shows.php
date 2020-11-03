<?php
    require 'header.php';
    require 'navbar.php';
?>
 
<div class="list-cinema">
<h3><?php echo $movie->getTitle() ?></h3>
<p><?php echo $movie->getOverview() ?></p>
    <?php
        if(isset($showArrays)){    
            foreach($showArrays as $show)
            {
                if ($show->getDate() >= date('Y-m-d')) {
                    if($id == $show->getMovie()->getId()){
                        $cinemas = $this->CinemaDAO->getCinemaById($show->getIdCinema());
                        echo '
                                <div class="cinema-card">
                                    <h2 class="cinema-info">'. $show->getDate() .'</h2>
                                    <h2 class="cinema-info">'. $show->getTime() .'</h2>
                                    <h2 class="cinema-info">'. $show->getTicketValue() .'</h2>
                                    <p class="cinema-info">'. $cinemas->getName() .'</p>     
                                    <p class="cinema-info">'. $cinemas->getAddress() .'</p>     
                                </div>
                            ';       
                    }
                }
            }
        }
    ?>
</div>

<?php
    require 'footer.php';
?>