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
            <?php
            foreach($cinema->getRooms() as $room)
            {?>
                <p class="cinema-info"><small> Sala: <?= $room->getName()?> </small></p>
                <p class="cinema-info"><small> Capacidad: <?= $room->getCapacity()?> </small></p>
                <p class="cinema-info"><small> Precio: <?= $room->getPrice()?> </small></p>
            <?php }?>
            

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

        <button class="cinema-add">
            <a class="cinema-link" href="<?= ROOT_CLIENT ?>Cinema/addCinema">
                <img class="cinema-svg" src="<?= ROOT_CLIENT ?>presentation/svg/add-white-18dp.svg">
                <p>Nuevo Cine</p>
            </a>
        </button>

    </div>
</main>

<?php include_once("footer.php");?>