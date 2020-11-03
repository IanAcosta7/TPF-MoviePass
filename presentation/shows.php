    <div class="list-cinema">
    <h3><?php echo $Movie->getName() ?></h3>
    <p><?php echo $Movie->getOverview() ?></p>
        <?php
            if(isset($showArrays)){    
                foreach($showArrays as $show)
                {
                    if($id == $show->getIdMovie){
                        echo '
                                <div class="cinema-card">
                                    <h2 class="cinema-info">'. $show->getDate() .'</h2>
                                    <h2 class="cinema-info">'. $show->getTime() .'</h2>
                                    <h2 class="cinema-info">'. $show->getTicketValue() .'</h2>
                                    <p class="cinema-info">'. $CinemaDAO->getCinemaById($show->getIdCinema())->getName() .'</p>     
                                    <p class="cinema-info">'. $CinemaDAO->getCinemaById($show->getIdCinema())->getAddress() .'</p>     
                                </div>
                            ';       
                    }
                }
            }
        ?>
    </div>






?>