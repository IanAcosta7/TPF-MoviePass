<?php include_once("header.php");?>

    <table border=1>
        <thead>
            <th>Capacidad</th>
            <th>Nombre</th>
            <th>Direccion</th>
        </thead>
        <tbody>
            <form action="delete" method="GET">
                <?php
                    if(isset($cinemas)){
                        foreach($cinemas as $Cinema){
                            ?>
                                <tr>
                                    <td><?= $Cinema->getCapacity(); ?></td>
                                    <td><?= $Cinema->getName(); ?></td>
                                    <td><?= $Cinema->getAddress(); ?></td>
                                    <td>
                                        <button type="submit" name="nombre" value=<?= $Cinema->getName(); ?>> Eliminar</button>
                                    <td>                                             
                                </tr>
                            <?php
                            }
                            }
                            ?>
            </form>          
        </tbody>
    </table>

    <a href="<?=ROOT_CLIENT?>cinema/addCinema">Añadir Cine</a>

<?php include_once("footer.php");?>