<?php namespace DAO;

use DAO\Database;

class GenreDAO {
    private $genres = array();

    public function GetAll()
    {
        $this->RetrieveData();
        //$this->saveInDatabase();
        return $this->genres;
    }

    private function saveInDatabase(){
        $data = Database::execute('get_genres');
        $array = array_filter($this->genres, function ($genre){
            $flag = false;
            foreach ($data as $value) {
                if($value == $genre){
                    $flag = true;
                }
            }
            return $flag;
        });
        if(count($array) > 0){
            Database::execute('set_genres', $array);
        }
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
                array_push($this->genres, $valuesArray);
            }
        }catch(Exception $e){
            print_r($e);
        }
    }
}