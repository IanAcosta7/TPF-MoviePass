<?php
    namespace DAO;

    use DAO\IMovieDAO as IMovieDAO;
    use modelsBusinessObject\Movie as Movie;

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
                $valuesArray["media_type"] = $movie->getMedia_type();
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
            
            file_put_contents('https://api.themoviedb.org/4/list/1?page=1&api_key=', $jsonContent);
        }

        private function RetrieveData()
        {
            $this->movieList = array();

            if(file_exists('https://api.themoviedb.org/4/list/1?page=1&api_key='))
            {
                $jsonContent = file_get_contents('https://api.themoviedb.org/4/list/1?page=1&api_key=');

                $arrayToDecode = ($jsonContent) ? json_decode($jsonContent, true) : array();

                foreach($arrayToDecode as $valuesArray)
                {
                    $movie = new movie();
                    $movie->$movie->setPoster_path( $valuesArray["poster_path"]);
                    $movie->$movie->setPopularity( $valuesArray["popularity"]);
                    $movie->$movie->setVote_count( $valuesArray["vote_count"]);
                    $movie->$movie->setVideo( $valuesArray["video"]);
                    $movie->$movie->setMedia_type( $valuesArray["media_type"]);
                    $movie->$movie->setId( $valuesArray["id"]);
                    $movie->$movie->setAdult( $valuesArray["adult"]);
                    $movie->$movie->setBackdrop_path( $valuesArray["backdrop_path"]);
                    $movie->$movie->setOriginal_language( $valuesArray["original_language"]);
                    $movie->$movie->setOriginal_title( $valuesArray["original_title"]);
                    $movie->$movie->setGenre_ids( $valuesArray["genre_ids"]);
                    $movie->$movie->setTitle( $valuesArray["title"]);
                    $movie->$movie->setVote_average( $valuesArray["vote_average"]);
                    $movie->$movie->setOverview( $valuesArray["overview"]);
                    $movie->$movie->setRelease_data( $valuesArray["release_data"]);

                    array_push($this->movieList, $movie);
                }
            }
        }
    }
?>