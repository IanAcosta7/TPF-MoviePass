<?php 
     $navbarButtons = '
          <a class="navbar-btn menu-btn" href="'. ROOT_CLIENT .'Movie">Cancelar</a>
     ';

     require_once("header.php");
     require_once("navbar.php");
?>
    

    <main class="movies">
          <form class="movie-filters" action="<?php echo ROOT_CLIENT?>movie/showAdd" method="POST">
               <label for="filterGenre">
                    <span>Genero</span>
                    <select name="genre" id="genre">
                         <option value='default'>Todas</option>
                         <?php 
                              foreach($genres as $genre)
                              {
                                   echo "<option value=".$genre['name'].">".$genre['name']."</option>";
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
          <form action='<?php echo ROOT_CLIENT?>Movie/addShowForm' method='post'>
               <div class="movie-list">
                    <?php
                         if(isset($data)) {
                              if($filterGenre != null) {
                                   $data = array_filter($data, function($var) use ($filterGenre, $genres) {
                                        $flag = false;
                                        foreach($var->getGenre_ids() as $genre) {
                                             foreach ($genres as $value) {
                                                  if ($genre == $value['id'] && $value['name'] == $filterGenre)
                                                       $flag = true;   
                                             }
                                        }
                                        return $flag;
                                   });  
                              }
                         
                              if (isset($data)) {
                                   if($filterGenre != null || $filterDateFrom != null || $filterDateTo != null || $filterName!=date("Y-m-d")) {
                                        $data = array_filter(
                                             $data,
                                             function($var)
                                             use ($filterGenre,$filterName, $filterDateFrom, $filterDateTo ,$genres)
                                        {
                                             $flag = false;
                                             $flagGenre=true;
                                             $flagDate=true;
                                             $flagName=true;

                                             if($filterGenre != null) {
                                                  $flagGenre=false;
                                                  foreach ($var->getGenre_ids() as $genre) {
                                                       foreach ($genres as $value) {
                                                            if ($genre == $value['id'] && $value['name'] == $filterGenre)
                                                                 $flagGenre = true;   
                                                       }
                                                  }
                                             }
                                             if($filterName != null ) {
                                                  $pos= strpos($var->getTitle(),$filterName);
                                                  $flagName=false;
                                                  if($pos!==false)
                                                       $flagName=true;
                                             }

                                             if($filterDateFrom !=null || $filterDateFrom !=null) {
                                                  $flagDate=false;
                                                  if($filterDateFrom > $var->getRelease_date() &&  $var->getRelease_date()> $filterDateTo)
                                                       $flagDate= true;
                                             }

                                             if($flagGenre==true && $flagDate==true && $flagName==true)
                                                  $flag=true;

                                             return $flag;
                                        });  
                                   }
                              }     
                              foreach($data as $Movie) {
                                   echo '
                                        <div class="card-box">
                                             <div>
                                                  <img class="card-poster" src="https://image.tmdb.org/t/p/w500'. $Movie->getPoster_path() .'">
                                                  <button class="add-movie-btn" type="submit">Agregar a Cartelera</button>
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
                                                       
                                   foreach ($Movie->getGenre_ids() as $genre) {
                                        foreach ($genres as $value) {
                                             if ($genre == $value['id'])
                                                  echo $value['name'] . ' ';
                                        }
                                   }

                                   echo '
                                                  </li>
                                                  </ul>
                                                  <small class="card-date">'. $Movie->getRelease_date() .'</small>
                                                  <input type="hidden" name= "idMovie" value='.$Movie->getId().'>
                                             </div>
                                        </div>
                                   ';
                              }
                              
                         }
                    ?>
               </div>
          </form>
     </main>

<?php
require_once("footer.php");
?>