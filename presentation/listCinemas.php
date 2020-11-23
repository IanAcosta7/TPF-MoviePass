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
            <table class="cinema-rooms">
                <tr>
                    <th>Sala</th>
                    <th>Capacidad</th>
                    <th>Precio</th>
                    <th>Borrar</th>
                </tr>
                <?php
                    foreach($cinema->getRooms() as $room) {
                ?>
                <tr>
                    <td class="cinema-info"><small><?= $room->getName()?> </small></td>
                    <td class="cinema-info"><small><?= $room->getCapacity()?> </small></td>
                    <td class="cinema-info"><small>$<?= $room->getPrice()?> </small></td>
                    <td>
                        <form action="<?php echo ROOT_CLIENT?>Room/deleteRoom" method="POST">
                            <input type="hidden" name="id" value="<?= $room->getId() ?>">
                            <button type="submit"><img src="<?= ROOT_CLIENT ?>presentation/svg/delete-white-18dp.svg"></button>
                        </form>       
                    </td>
                </tr>
                <?php 
                    }
                ?>
            </table>
            
            <form action="<?= ROOT_CLIENT?>Room/addRoom" method="POST">
                <input type="hidden" name="idCinema" value="<?= $cinema->getId() ?>">
                <button type="submit"><small>Agregar sala</small></button>
            </form> 

            <form action="<?php echo ROOT_CLIENT?>cinema" method="POST">
                <input type="hidden" name="id" value="<?= $cinema->getId() ?>">
                <button class="cinema-delete-btn" type="submit"><small>Eliminar</small></button>
            </form>         
        </div>

        <?php
            }
        }
        ?>

        <button class="cinema-add">
            <a class="btn-link" href="<?= ROOT_CLIENT ?>Cinema/addCinema">
                <img class="cinema-svg" src="<?= ROOT_CLIENT ?>presentation/svg/add-white-18dp.svg">
                <p>Nuevo Cine</p>
            </a>
        </button>

    </div>
</main>

<?php include_once("footer.php");?>