<?php 
require_once("header.php");
?>
    <form action="" method="POST">
        <label for="genre">Genero</label>
        <select name="genre" id="genre">
            <?php 
                foreach($genres as $genre)
                {
                    echo "<option value=".$genre['name'].">".$genre['name']."</option>";
                }
            ?>
        </select>
        <br>
        <label for="name">Nombre</label>
        <input type="text" name="name">
        <br>
        <label for="dateFrom">Desde</label>
        <input type="date" name="dateFrom">
        <br>
        <label for="dateTo">Hasta</label>
        <input type="date" name="dateTo">
            
    </form>
<?php
require_once("footer.php");
?>