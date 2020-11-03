<?php 
     $navbarButtons = '
          <a class="navbar-btn menu-btn" href="'. ROOT_CLIENT .'Movie">Volver</a>
     ';

     require_once("header.php");
     require_once("navbar.php");
?>
    

    <main class="movies">
          <form class="movie-filters" action="<?php echo ROOT_CLIENT?>Movie/showAddMovie" method="POST">
               <label for="filterGenre">
                    <span>Genero</span>
                    <select name="genre" id="genre">
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

               <label for="FilterName">
                    <span>Nombre</span>
                    <input type="text" name="FilterName">
               </label>

               <label for="filterDateFrom">
                    <span>Desde</span>
                    <input type="date" name="filterDateFrom">
               </label>

               <label for="filterDateTo">
                    <span>Hasta</span>
                    <input type="date" name="filterDateTo">
               </label>

               <button type="submit">Filtrar</button>
                    
          </form>
          <div class="movie-list">
               <?php
                    if(isset($data)) {
                         if($filterGenre != null || $filterDateFrom != null || $filterDateTo != null || $filterName != null) {
                              $data = array_filter(
                                   $data,
                                   function($var)
                                   use ($filterGenre,$filterName, $filterDateFrom, $filterDateTo)
                              {
                                   $flag = false;
                                   $flagGenre=true;
                                   $flagDate=true;
                                   $flagName=true;

                                   if($filterGenre != null) {
                                        $flagGenre=false;
                                        foreach ($var->getGenres() as $genre) {
                                             if ($genre->getId() == $filterGenre)
                                                  $flagGenre = true;   
                                        }
                                   }

                                   if($filterName != null ) {
                                        $movieName = strtolower($var->getTitle());
                                        $pos= strpos($movieName, strtolower($filterName));
                                        $flagName=false;
                                        if($pos!==false)
                                             $flagName=true;
                                   }

                                   if($filterDateFrom != null || $filterDateTo !=null) {
                                        $flagDate=false;
                                        if($filterDateFrom < $var->getRelease_date() &&  $var->getRelease_date() < $filterDateTo)
                                             $flagDate= true;
                                   }

                                   if($flagGenre==true && $flagDate==true && $flagName==true)
                                        $flag=true;

                                   return $flag;
                              });  
                         }
                         foreach($data as $Movie) {
                              echo '
                                   <div class="card-box">
                                        <div>
                                             <form action="' . ROOT_CLIENT . 'Movie/addShowForm" method="post">
                                                  <img class="card-poster" src="https://image.tmdb.org/t/p/w500'. $Movie->getPoster_path() .'">
                                                  <input type="hidden" name= "idMovie" value='.$Movie->getId().'>
                                                  <button class="add-movie-btn" type="submit">Agregar a Cartelera</button>
                                             </form>
                                        </div>
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

<?php
require_once("footer.php");
?>