<?php
    namespace DAO;

    use DAO\IMovieDAO;
    use DAO\GenreDAO;
    use DAO\Database;
    use business\models\Movie;
    use business\models\Genre;
    
    require_once("./config/ENV.php");

    class MovieDAO implements IMovieDAO
    {
        private $movieList = array();

        public function Add(Movie $movie)
        {
            $this->RetrieveData();
            
            array_push($this->movieList, $movie);

            $this->SaveData();
        }

        public function GetAll()
        {
            $this->FetchAll();
            return $this->movieList;
        }

        public function FetchAll() {
            $this->RetrieveData();
            $this->saveInDatabase();
        }

        private function saveInDatabase(){
            Database::connect();

            // Busco si existen nuevos generos
            $genreDAO = new GenreDAO();
            $genreDAO->FetchAll();

            // Agarro las peliculas de la DB
            $DBMovies = $this->getDBMovies();

            // Agarro las peliculas de la API que no esten en la DB
            $APIMovies = array_filter($this->movieList, function ($movie) use($DBMovies){
                $flag = true;
                foreach ($DBMovies as $value) {
                    if($value->getId() == $movie->getId())
                        $flag = false;
                }
                return $flag;
            });

            // Por cada pelicula que no este en la DB la guardo
            foreach ($APIMovies as $movie) {
                Database::execute('add_movie',
                    'IN',
                    array(
                        $movie->getId(),
                        $movie->getPopularity(),
                        $movie->getVote_count(),
                        $movie->getPoster_path(),
                        $movie->getAdult(),
                        $movie->getBackdrop_path(),
                        $movie->getOriginal_language(),
                        $movie->getOriginal_title(),
                        $movie->getTitle(),
                        $movie->getVote_average(),
                        $movie->getOverview(),
                        $movie->getRelease_date()
                    )
                );

                foreach ($movie->getGenres() as $genre) {
                    Database::execute('add_movie_genre', 'IN', array($movie->getId(), $genre->getId()));
                }
            }
            
            $this->movieList = array_merge($DBMovies, $APIMovies);
        }
        
        private function SaveData()
        {
            $arrayToEncode = array();

            foreach($this->movieList as $movie)
            {
                $valuesArray["poster_path"] = $movie->getPoster_path();
                $valuesArray["popularity"] = $movie->getPopularity();
                $valuesArray["vote_count"] = $movie->getVote_count();
                $valuesArray["id"] = $movie->getId();
                $valuesArray["adult"] = $movie->getAdult();
                $valuesArray["backdrop_path"] = $movie->getBackdrop_path();
                $valuesArray["original_language"] = $movie->getOriginal_language();
                $valuesArray["original_title"] = $movie->getOriginal_title();
                $valuesArray["genre_ids"] = $movie->getGenres();
                $valuesArray["title"] = $movie->getTitle();
                $valuesArray["vote_average"] = $movie->getVote_average();
                $valuesArray["overview"] = $movie->getOverview();
                $valuesArray["release_data"] = $movie->getRelease_data();

                array_push($arrayToEncode, $valuesArray);
            }

            $jsonContent = json_encode($arrayToEncode, JSON_PRETTY_PRINT);
            
            file_put_contents(''. API_key, $jsonContent);
        }

        private function RetrieveData()
        {
            $this->movieList = array();
            try{
                $jsonContent = file_get_contents('https://api.themoviedb.org/3/movie/now_playing?language=es&page=1&api_key='. API_key);

                $LIST = ($jsonContent) ? json_decode($jsonContent, true) : array();
                
                $arrayToDecode = $LIST["results"];

                $genreDAO = new GenreDAO();
                $genres = $genreDAO->getAll();

                foreach($arrayToDecode as $valuesArray)
                {
                    $movie = new Movie(
                        $valuesArray["id"],
                        $valuesArray["poster_path"],
                        $valuesArray["popularity"],
                        $valuesArray["vote_count"],
                        $valuesArray["adult"],
                        $valuesArray["backdrop_path"],
                        $valuesArray["original_language"],
                        $valuesArray["original_title"],
                        array_filter($genres, function ($genre) use ($valuesArray) {
                            return in_array($genre->getId(), $valuesArray["genre_ids"]);
                        }),
                        $valuesArray["title"],
                        $valuesArray["vote_average"],
                        $valuesArray["overview"],
                        $valuesArray["release_date"]
                    );

                    array_push($this->movieList, $movie);
                }
            }catch(Exception $e){
                print_r($e);
            }
        }

        private function getDBMovies() {
            $DBMovies = Database::execute('get_movies', 'OUT');


            $DBMovies = array_map(function ($movie) {
                $genres = Database::execute('get_genres_of_movie', 'OUT', array($movie["id_movie"]));

                $genres = array_map(function ($genre) {
                    return new Genre($genre['id_genre'], $genre['genre_name']);
                }, $genres);

                return new Movie(
                    $movie["id_movie"],
                    $movie["poster_path"],
                    $movie["popularity"],
                    $movie["vote_count"],
                    $movie["adult"],
                    $movie["backdrop_path"],
                    $movie["original_language"],
                    $movie["original_title"],
                    $genres,
                    $movie["title"],
                    $movie["vote_average"],
                    $movie["overview"],
                    $movie["release_date"]
                );
            }, $DBMovies);

            return $DBMovies;
        }

        public function getMovieById($id)
        {
            Database::connect();
            $Movie = Database::execute("get_movie_by_id", "OUT", array($id))[0];
            $genres = Database::execute('get_genres_of_movie', 'OUT', array($Movie['id_movie']));
            return new Movie(
                $Movie["id_movie"],
                $Movie["poster_path"],
                $Movie["popularity"],
                $Movie["vote_count"],
                $Movie["adult"],
                $Movie["backdrop_path"],
                $Movie["original_language"],
                $Movie["original_title"],
                array_map(function ($genre){
                    return new Genre($genre['id_genre'], $genre['genre_name']);
                 }, $genres),
                $Movie["title"], 
                $Movie["vote_average"], 
                $Movie["overview"], 
                $Movie["release_date"]);
            

        }
    }
?>