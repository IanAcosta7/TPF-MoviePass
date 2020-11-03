<?php 
    $navbarButtons = '
        <a class="navbar-btn menu-btn" href="'. ROOT_CLIENT .'Movie">Volver</a>
    ';

    include_once("header.php");
    include_once("navbar.php");
?>

    <main>
        <a href="<?=ROOT_CLIENT?>cinema/addCinema">Nuevo cine</a>

        <div class="cinema-list">
            <?php
                if(isset($cinemas)){
                    foreach($cinemas as $cinema){
                        echo '
                            <div class="cinema-card">
                                <h3 class="cinema-info">'. $cinema->getName() .'</h3>
                                <p class="cinema-info">'. $cinema->getAddress() .'</p>
                                <p class="cinema-info"><small>Capacidad: '. $cinema->getCapacity() .'</small></p>

                                <form action="'.ROOT_CLIENT.'cinema" method="POST">
                                    <input type="hidden" name="id" value="'. $cinema->getId() .'">
                                    <button class="cinema-delete-btn" type="submit">Eliminar</button>
                                </form>          
                            </div>
                        ';
                    }
                }
            ?>
        </div>
    </main>

<?php include_once("footer.php");?>