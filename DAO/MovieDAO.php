<?php
    namespace DAO;

    use DAO\IMovieDAO as IMovieDAO;
    use business\models\Movie as Movie;
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
            $this->RetrieveData();

            return $this->movieList;
        }

        private function SaveData()
        {
            $arrayToEncode = array();

            foreach($this->movieList as $movie)
            {
                $valuesArray["poster_path"] = $movie->getPoster_path();
                $valuesArray["popularity"] = $movie->getPopularity();
                $valuesArray["vote_count"] = $movie->getVote_count();
                $valuesArray["video"] = $movie->getVideo();
                $valuesArray["id"] = $movie->getId();
                $valuesArray["adult"] = $movie->getAdult();
                $valuesArray["backdrop_path"] = $movie->getBackdrop_path();
                $valuesArray["original_language"] = $movie->getOriginal_language();
                $valuesArray["original_title"] = $movie->getOriginal_title();
                $valuesArray["genre_ids"] = $movie->getGenre_ids();
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
                $jsonContent = file_get_contents('https://api.themoviedb.org/3/movie/popular?language=es&page=1&api_key='. API_key);

                $LIST = ($jsonContent) ? json_decode($jsonContent, true) : array();
                
                $arrayToDecode = $LIST["results"];
                

                foreach($arrayToDecode as $valuesArray)
                {
                    $movie = new movie();
                    $movie->setPoster_path( $valuesArray["poster_path"]);
                    $movie->setPopularity( $valuesArray["popularity"]);
                    $movie->setVote_count( $valuesArray["vote_count"]);
                    $movie->setVideo( $valuesArray["video"]);
                    $movie->setId( $valuesArray["id"]);
                    $movie->setAdult( $valuesArray["adult"]);
                    $movie->setBackdrop_path( $valuesArray["backdrop_path"]);
                    $movie->setOriginal_language( $valuesArray["original_language"]);
                    $movie->setOriginal_title( $valuesArray["original_title"]);
                    $movie->setGenre_ids( $valuesArray["genre_ids"]);
                    $movie->setTitle( $valuesArray["title"]);
                    $movie->setVote_average( $valuesArray["vote_average"]);
                    $movie->setOverview( $valuesArray["overview"]);
                    $movie->setRelease_date( $valuesArray["release_date"]);

                    array_push($this->movieList, $movie);
                }
            }catch(Exception $e){
                print_r($e);
            }
        }
    }
?>