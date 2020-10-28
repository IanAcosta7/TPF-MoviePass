<?php 

    $idMovie = $_POST['id'];?>
     
    <form action="<?php echo ROOT_CLIENT?>Movie/addShow" method="POST">

         <label for="cinema">Cines</label>
         <select name="cinemas" id="cinemas">
            <?php 
                foreach($cinemaList as $cinema)
                {
                    echo "<option value=".$cinema['name']"</option>";
                }
            ?>
        </select> 

        <label for="date">Dia</label>
        <input type="date" name="date" required>

        <label for="time">Horario</label>
        <input type="time" name="time" required> 

        <input type="hidden" name="id" value= <?php$idMovie?> required> 

        <button type="submit" name="submit" value=1>Finalizar</button>
        <button type="submit" name="submit" value=0>Cargar otro</button>
    
    </form>
     







