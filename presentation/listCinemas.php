<?php 
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
                <form action="<?= ROOT_CLIENT?>Room/addRoom" method="POST">
                    <input type="hidden" name="idCinema" value="<?= $cinema->getId() ?>">
                    <button class="cinema-delete-btn" type="submit">Agregar sala</button>
                </form>          
            </div>

            <?php
                }
            }
            ?>
        </div>
    </main>

<?php include_once("footer.php");?>