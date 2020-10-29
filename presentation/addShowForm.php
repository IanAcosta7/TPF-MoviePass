<?php
    require_once("header.php");
    require_once("navbar.php");
?>

     
    <form action="<?php echo ROOT_CLIENT?>Movie/addShow" method="POST">

         <label for="cinema">Cines</label>
         <select name="cinemas" id="cinemas">
            <?php 
                foreach($cinemaList as $cinema)
                {
                    echo '<option value="'. $cinema->getId() .'">'. $cinema->getName() .'</option>';
                }
            ?>
        </select> 

        <label for="date">Dia</label>
        <input type="date" name="date" required>

        <label for="time">Horario</label>
        <input type="time" name="time" required> 

        <label for="ticketValue">Valor de la entrada</label>
        <input type="text" name="ticketValue" required> 

        <input type="hidden" name="idMovie" value= "<?php echo $idMovie ?>" required> 

        <button type="submit" >Finalizar</button>
        
    </form>

<?php require_once("footer.php"); ?> 
     







