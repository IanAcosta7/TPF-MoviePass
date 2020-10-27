<?php 
require_once("header.php");
?>
    <form action="<?php echo ROOT_CLIENT?>movie/showAddMovie" method="POST">
        <label for="filterGenre">Genero</label>
        <select name="genre" id="genre">
        <option value='default'>Todas</option>
            <?php 
                foreach($genres as $genre)
                {
                    echo "<option value=".$genre['name'].">".$genre['name']."</option>";
                }
            ?>
        </select>
        <br>
        <label for="FilterName">Nombre</label>
        <input type="text" name="FilterName">
        <br>
        <label for="filterDateFrom">Desde</label>
        <input type="date" name="filterDateFrom">
        <br>
        <label for="filterDateTo">Hasta</label>
        <input type="date" name="filterDateTo">

        <button type="submit">Filtrar</button>
            
    </form>

    <table border="1">
                    <thead>
                         <th>Poster</th>
                         <th>Popularidad</th>
                         <th>Votos</th>
                         <th>Video</th>
                         <th>ID</th>
                         <th>ATP</th>
                         <th>Backdrop path</th>
                         <th>Lenguaje original</th>
                         <th>Titulo</th>
                         <th>Genero</th>
                         <th>Titulo</th>
                         <th>Media de votos</th>
                         <th>descripcion</th>
                         <th>Fecha de lanzamiento</th>

                    </thead>
                    <tbody>

                         <?php
                              if(isset($data)){
                                  echo $filterName;
                                  echo $filterGenre;
                                  echo $filterDateFrom;
                                  echo $filterDateTo;
                                   if($filterGenre != null || $filterDateFrom != null || $filterDateTo != null || $filterName!=date("Y-m-d")) //Revisar si esta bien esto
                                   {
                                        $data = array_filter($data, function($var)use($filterGenre,$filterName, $filterDateFrom, $filterDateTo ,$genres){
                                        $flag = false;
                                        $flagGenre=true;
                                        $flagDate=true;
                                        $flagName=true;
                                        if($filterGenre != null)
                                        {
                                            $flagGenre=false;
                                            foreach($var->getGenre_ids() as $genre){
                                                foreach ($genres as $value) {
                                                     if ($genre == $value['id'] && $value['name'] == $filterGenre)
                                                          $flagGenre = true;   
                                                }
                                           }
                                        }
                                        if($filterName != null )
                                        {
                                            $flagName=false;
                                            if($var->getTitle() == $filterName)
                                            {
                                                $flagName=true;
                                            }
                                        }
                                        if($filterDateFrom !=null || $filterDateFrom !=null)
                                        {
                                            $flagDate=false;
                                            if($filterDateFrom > $var->getRelease_date() &&  $var->getRelease_date()> $filterDateTo)
                                            {
                                                $flagDate= true;
                                            }
                                        }
                                        echo "asd";
                                        
                                        if($flagGenre==true && $flagDate==true && $flagName==true)
                                        {
                                            $flag=true;
                                            
                                        }

                                        return $flag;
                                      });  
                                   }

                                   
                                   foreach($data as $Movie){

                                        ?>
                                             <tr>
                                                  <td><?= '<img src="https://image.tmdb.org/t/p/w500'. $Movie->getPoster_path(). '"/>'; ?></td>
                                                  <td><?= $Movie->getPopularity(); ?></td>
                                                  <td><?= $Movie->getVote_count(); ?></td>
                                                  <td><?= $Movie->getVideo(); ?></td>
                                                  <td><?= $Movie->getId(); ?></td>
                                                  <td><?= $Movie->getAdult(); ?></td>
                                                  <td><?= '<img src="https://image.tmdb.org/t/p/w500'. $Movie->getBackdrop_path(). '"/>'; ?></td>
                                                  <td><?= $Movie->getOriginal_language();?></td>
                                                  <td><?= $Movie->getOriginal_title();?></td>
                                                  <td><?php
                                                       foreach ($Movie->getGenre_ids() as $genre) {
                                                            foreach ($genres as $value) {
                                                                 if ($genre == $value['id'])
                                                                      echo $value['name'] . '<br>';
                                                            }
                                                       }
                                                  ?></td>
                                                  <td><?= $Movie->getTitle()?></td>
                                                  <td><?= $Movie->getVote_average()?></td>
                                                  <td><?= $Movie->getOverview()?></td>
                                                  <td><?= $Movie->getRelease_date()?></td>                                                
                                             </tr>
                                        <?php
                                   }
                              }
                         ?>

                         
                      
                    </tbody>
               </table>



<?php
require_once("footer.php");
?>