<?php 
     $navbarButtons = '
          <a class="navbar-btn menu-btn" href="'. ROOT_CLIENT .'Movie/showAddMovie">Agregar una pelicula</a>
     ';

     include_once("header.php");
     include_once("navbar.php");
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

               <button type="submit">Filtrar</button>
          </form>

          <div class="movie-list">
               <?php
                    if(isset($data)) {
                         if($filterGenre != null) {
                              $data = array_filter($data, function($var) use ($filterGenre) {
                                   $flag = false;
                                   foreach($var->getGenres() as $genre) {
                                        if ($genre->getId() == $filterGenre)
                                             $flag = true;   
                                   }
                                   return $flag;
                              });  
                         } 
                         foreach($data as $Movie) {
                              echo '
                                   <div class="card-box">
                                        <img class="card-poster" src="https://image.tmdb.org/t/p/w500'. $Movie->getPoster_path() .'">
                                        <div class="card-info">
                                             <h3>'. $Movie->getTitle() .'</h3>
                                             <div>'. $Movie->getOriginal_title() .'</div>
                                             <!--<p>'. $Movie->getOverview() .'</p>-->
                                             <ul>
                                                  <li>'. $Movie->getPopularity() .'</li>
                                                  <li>'. $Movie->getVote_average() .'</li>
                                                  <li>'. $Movie->getVote_count() .'</li>
                                                  <li>'. $Movie->getOriginal_language() .'</li>
                                                  <li>
                              ';
                                                  
                              foreach ($Movie->getGenres() as $genre) {
                                   echo $genre->getName() . ' ';
                              }

                              echo '
                                                  </li>
                                             </ul>
                                             <small class="card-date">'. $Movie->getRelease_date() .'</small>
                                        </div>
                                   </div>
                              ';
                         }
                    }
               ?>
          </div>
     </main>

<?php include_once("header.php");?>