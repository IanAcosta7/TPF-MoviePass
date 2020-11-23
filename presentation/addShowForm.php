<?php
    require_once("header.php");
    require_once("navbar.php");
?>

     
    <form class="card-form" action="<?php echo ROOT_CLIENT?>Movie/addShow" method="POST">

        <h3>Nueva Función</h3>

        <div class="card-left">
            <h4 for="cinema">Cine</h4>
        </div>
        <select class="card-input card-select" name="cinemas" id="cinemas">
            <?php 
                foreach($cinemaList as $cinema)
                {
                    foreach ($cinema->getRooms() as $room)
                    {
                        echo '<option value="'. $room->getId() .'">'. $cinema->getName() . ': ' . $room->getName() .'</option>';
                    }
                }
            ?>
        </select> 

        <div class="card-left">
            <h4 for="date">Dia</h4>
        </div>
        <input class="card-input" type="date" name="date" required>

        <div class="card-left">
            <h4 for="time">Horario</h4>
        </div>
        <input class="card-input" type="time" name="time" required> 

        <input type="hidden" name="idMovie" value= "<?php echo $idMovie ?>" required> 

        <button type="submit" >Finalizar</button>
        
    </form>

<?php require_once("footer.php"); ?> 
     







