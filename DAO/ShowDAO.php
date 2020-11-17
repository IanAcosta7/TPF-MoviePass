<?php namespace DAO;

use business\models\Show;
use business\models\Movie;
use business\models\Genre;
use business\models\Room;
use DAO\Database;

require_once("./config/ENV.php");


class ShowDAO {
    private $shows = array();

    public function GetAll(){
        $this->shows = $this->getDBShows();
        return $this->shows;
    }

    public function add($idRoom, $idMovie, $date, $time){
        Database::connect();
        Database::execute('add_show', 'IN', array($idRoom, $idMovie, $date, $time));
    }

    private function getDBShows(){
        Database::connect();
        $DBShows = Database::execute('get_shows', 'OUT');
        $DBShows = array_map(function ($show){
            $movie = Database::execute('get_movie_by_id', 'OUT', array($show['id_movie']))[0];
            $room = Database::execute('get_room_by_id', 'OUT', array($show['id_room']))[0];
            $genres = Database::execute('get_genres_of_movie', 'OUT', array($movie['id_movie']));
            return new Show($show['id_show'], 
                new Room(
                    $room['id_cinema'],
                    $room['room_name'],
                    $room['room_capacity'],
                    $room['room_price'],
                    $room['id_room']
                ),
                new Movie(
                    $movie["id_movie"],
                    $movie["poster_path"],
                    $movie["popularity"],
                    $movie["vote_count"],
                    $movie["adult"],
                    $movie["backdrop_path"],
                    $movie["original_language"],
                    $movie["original_title"],
                    array_map(function ($genre){
                        return new Genre($genre['id_genre'], $genre['genre_name']);
                    }, $genres),
                    $movie["title"],
                    $movie["vote_average"],
                    $movie["overview"],
                    $movie["release_date"]
                ),
                $show['show_date'],
                $show['show_time']
            );
        }, $DBShows);

        return $DBShows;
    }

    public function getShowByID($idShow)
    {
        Database::connect();
            $Show = Database::execute("get_show_by_id", "OUT", array($idShow))[0];
            $room = Database::execute("get_room_by_id", "OUT", array($Show['id_room']))[0];
            return new Show(
                $Show["id_show"],
                new Room(
                    $room['id_cinema'],
                    $room['room_name'],
                    $room['room_capacity'],
                    $room['room_price'],
                    $room['id_room']
                ),
                $Show["id_movie"],
                $Show["show_date"],
                $Show["show_time"]
               );
               
    }
}

?>