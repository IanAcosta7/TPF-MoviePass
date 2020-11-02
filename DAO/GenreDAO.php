<?php namespace DAO;

use DAO\Database;
use business\models\Genre;

class GenreDAO {
    private $genres = array();

    public function GetAll()
    {
        $this->FetchAll();
        return $this->genres;
    }

    public function FetchAll() {
        $this->RetrieveData();
        $this->saveInDatabase();
    }

    private function saveInDatabase(){
        Database::connect();

        $DBGenres = Database::execute('get_genres', 'OUT');

        $DBGenres = array_map(function ($genre) {
            return new Genre($genre['id_genre'], $genre['genre_name']);
        }, $DBGenres);

        $APIGenres = array_filter($this->genres, function ($genre) use ($DBGenres) {
            $flag = true;
            foreach ($DBGenres as $value) {
                if($value == $genre){
                    $flag = false;
                }
            }
            return $flag;
        });

        foreach ($APIGenres as $genre) {
            Database::execute('add_genre', 'IN', array($genre->getId(), $genre->getName()));
        }

        $this->genres = array_merge($DBGenres, $APIGenres);
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
                $newGenre = new Genre($valuesArray["id"], $valuesArray["name"]);

                array_push($this->genres, $newGenre);
            }
        }catch(Exception $e){
            print_r($e);
        }
    }
}