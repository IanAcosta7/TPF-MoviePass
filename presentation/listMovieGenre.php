<?php

if($_POST){

if(isset($_POST['id'])){

    $genreId = $_POST['id'];
    ?>
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
        foreach($data as $Movie){
            if($Movie->getGenre_ids() == $genreId)
            {
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
   }

}
    