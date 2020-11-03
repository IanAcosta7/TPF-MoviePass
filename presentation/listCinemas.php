<?php 
    $navbarButtons = '
        <a class="navbar-btn menu-btn" href="'. ROOT_CLIENT .'Movie">Volver</a>
<<<<<<< HEAD
        <a class="navbar-btn menu-btn" href="'. ROOT_CLIENT .'Cinema/addCinema">Nuevo cine</a>
=======
>>>>>>> 7c33a9944b3ae1a851c7a9ce8f4bcd272a6a3542
    ';

    include_once("header.php");
    include_once("navbar.php");
?>

    <main>
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