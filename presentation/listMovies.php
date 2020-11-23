<?php 
     include_once("header.php");
     include_once("navbar.php");

     $movies = array();

     foreach ($data as $show) {
          // Si la pelicula es posterior a la fecha actual y no se agrego todavia, se agrega al arreglo
          if($show->getDate() >= date('Y-m-d') && !in_array($show->getMovie(), $movies)){
               // Tambien comprobamos si la fecha filtrada es igual
               if ($filterDate == null)
                    array_push($movies, $show->getMovie());
               else {
                    if ($show->getDate() == $filterDate)
                         array_push($movies, $show->getMovie());
               }
          }
     }
?>

<main class="movies">
     <form class="movie-filters" action="<?php echo ROOT_CLIENT?>movie/" method="post">
          <label for="filterGenre">
               <span>Género</span>
               <select name="filterGenres" id="">
                    <option value='default'>Todas</option>
                    <?php 
                         foreach($genres as $genre)
                         {
                              if ($filterGenre)
                                   $checked = $genre->getId() == $filterGenre ? 'selected' : '';

                              echo '<option value="'.$genre->getId().'" '. $checked .' >'.$genre->getName().'</option>';
                         }
                    ?>
               </select>
          </label>
          <label for="filterGenre">
               <span>Fecha</span>
               <input name="filterDate" type="date">
          </label>

          <button type="submit">Filtrar</button>
     </form>

     <div class="movie-list">
          <?php
               if(isset($movies)) {
                    if($filterGenre != null) {
                         $movies = array_filter($movies, function($var) use ($filterGenre) {
                              $flag = false;
                              foreach($var->getGenres() as $genre) {
                                   if ($genre->getId() == $filterGenre)
                                        $flag = true;   
                              }
                              return $flag;
                         });  
                    } 
                    foreach($movies as $Movie) {
          ?>               
          <div class="card-box">
               <div>
                    <form action="<?php echo ROOT_CLIENT?>Movie/shows" method="GET">
                         <img class="card-poster" src="https://image.tmdb.org/t/p/w500<?= $Movie->getPoster_path() ?>">
                         <input name="movieId" type="hidden" value="<?= $Movie->getId() ?>">
                         <button class="add-movie-btn" type="submit">Ver Funciones</button>
                    </form>
               </div>
               <div class="card-info">
                    <h3><?php echo $Movie->getTitle()?></h3>
                    <div><?php echo $Movie->getOriginal_title()?></div>
                    <br>
                    <ul>
                         <li><b>Popularidad:</b> <?php echo $Movie->getPopularity()?></li>
                         <li><b>Votos:</b> <?php echo $Movie->getVote_count()?></li>
                         <li><b>Lenguaje:</b> <?php echo $Movie->getOriginal_language()?></li>
                         <li>
                         <?php                              
                              foreach ($Movie->getGenres() as $genre) {
                                   echo $genre->getName() . ' ';
                              }
                              ?>
                         </li>
                         <span class="card-vote"><?php echo $Movie->getVote_average()?></span>
                    </ul>
                    <small class="card-date"><?php echo $Movie->getRelease_date(); ?></small>
               </div>
          </div>
          <?php
                    }
               }
          ?>
     </div>
</main>

<?php include_once("header.php"); ?>