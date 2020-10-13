<?php include_once("header.php");?>


                <table border="1">
                    <thead>
                         <th>Poster</th>
                         <th>Popularidad</th>
                         <th>Votos</th>
                         <th>Video</th>
                         <th>Media</th>
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
                                   foreach($data as $Movie){

                                        ?>
                                             <tr>
                                                  <td><?php echo '<img src="https://image.tmdb.org/t/p/w500'. $Movie->getPoster_path(). '"/>'; ?></td>
                                                  <td><?php echo $Movie->getPopularity(); ?></td>
                                                  <td><?php echo $Movie->getVote_count(); ?></td>
                                                  <td><?php echo $Movie->getVideo(); ?></td>
                                                  <td><?php echo $Movie->getMedia_type(); ?></td>
                                                  <td><?php echo $Movie->getId(); ?></td>
                                                  <td><?php echo $Movie->getAdult(); ?></td>
                                                  <td><?php echo '<img src="https://image.tmdb.org/t/p/w500'. $Movie->getBackdrop_path(). '"/>'; ?></td>
                                                  <td><?php echo $Movie->getOriginal_language();?></td>
                                                  <td><?php echo $Movie->getOriginal_title();?></td>
                                                  <td><?php echo $Movie->getGenre_ids()?></td>
                                                  <td><?php echo $Movie->getTitle()?></td>
                                                  <td><?php echo $Movie->getVote_average()?></td>
                                                  <td><?php echo $Movie->getOverview()?></td>
                                                  <td><?php echo $Movie->getRelease_date()?></td>                                                
                                             </tr>
                                        <?php
                                   }
                              }
                         ?>
                      
                    </tbody>
               </table>







<?php include_once("header.php");?>