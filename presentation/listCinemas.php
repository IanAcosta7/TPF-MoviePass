<?php 
    $navbarButtons = '
        <a class="navbar-btn menu-btn" href="'. ROOT_CLIENT .'Movie">Volver</a>
        <a class="navbar-btn menu-btn" href="'. ROOT_CLIENT .'Cinema/addCinema">Nuevo cine</a>
    ';

    include_once("header.php");
    include_once("navbar.php");
?>

    <main>
        <div class="cinema-list">
            <?php
            if(isset($cinemas)){
                foreach($cinemas as $cinema){
            ?>   

            <div class="cinema-card">
                <h3 class="cinema-info"><?php echo$cinema->getName()?></h3>
                <p class="cinema-info"><?php echo $cinema->getAddress()?></p>
                <p class="cinema-info"><small>Capacidad: <?php echo $cinema->getCapacity()?></small></p>

                <form action="<?php echo ROOT_CLIENT?>cinema" method="POST">
                    <input type="hidden" name="id" value="<?= $cinema->getId() ?>">
                    <button class="cinema-delete-btn" type="submit">Eliminar</button>
                </form>          
            </div>

            <?php
                }
            }
            ?>
        </div>
    </main>

<?php include_once("footer.php");?>