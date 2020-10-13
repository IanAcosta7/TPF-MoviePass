<?php include_once("header.php");?>

    <table border=1>
        <thead>
            <th>Capacidad</th>
            <th>Nombre</th>
            <th>Direccion</th>
        </thead>
        <tbody>
            <form action="./process/deleteCinema.php" method="GET">
                <?php
                    if(isset($cinemas)){
                        foreach($cinemas as $Cinema){
                            ?>
                                <tr>
                                    <td><?php echo $Cinema->getCapacity(); ?></td>
                                    <td><?php echo $Cinema->getName(); ?></td>
                                    <td><?php echo $Cinema->getAddress(); ?></td>
                                    <td>
                                        <button type="submit" name="nombre" value=<?php $Cinema->getName(); ?>> Eliminar</button>
                                    <td>                                             
                                </tr>
                            <?php
                            }
                                }
                            ?>
            </form>          
        </tbody>
    </table>

<?php include_once("footer.php");?>