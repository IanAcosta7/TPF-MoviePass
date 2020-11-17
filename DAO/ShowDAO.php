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

    public function add($room, $idMovie, $date, $time){
        Database::connect();
        Database::execute('add_show', 'IN', array($room->getId(), $idMovie, $date, $time));
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
                    $room['id_room'],
                    $room['id_cinema'],
                    $room['room_name'],
                    $room['room_capacity'],
                    $room['room_price']
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
                $show['show_time'],
                $show['ticket_value'],
            );
        }, $DBShows);

        return $DBShows;
    }
}

?>