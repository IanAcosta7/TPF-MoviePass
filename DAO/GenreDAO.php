<?php namespace DAO;

class GenreDAO {
    private $genres = array();

    public function GetAll()
    {
        $this->RetrieveData();

        return $this->genres;
    }

    private function RetrieveData()
    {
        $this->genres = array();
        try{
            $jsonContent = file_get_contents('https://api.themoviedb.org/3/genre/movie/list?language=es&api_key='. API_key);

            $GENRES = ($jsonContent) ? json_decode($jsonContent, true) : array();
            
            $arrayToDecode = $GENRES["genres"];

            foreach($arrayToDecode as $valuesArray)
            {
                array_push($this->genres, $valuesArray["name"]);
            }
        }catch(Exception $e){
            print_r($e);
        }
    }
}