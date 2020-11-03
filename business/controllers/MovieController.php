<?php namespace business\controllers;

use DAO\MovieDAO;
use DAO\GenreDAO;
use DAO\Database;
use DAO\ShowDAO;
use DAO\CinemaDAO;

class MovieController {

    private $movieDAO;
    private $genres;
    private $showDAO;
    private $CinemaDAO;

    public function __construct() {
        $this->movieDAO = new MovieDAO();
        $this->genresDAO = new genreDAO();
        $this->showDAO= new ShowDAO();
        $this->CinemaDAO= new CinemaDAO();
    }

    public function Index($filterGenre = null) {
        $custom_css = 'movie-list.css';

        if($filterGenre == 'default')
            $filterGenre = null;
        $data = $this->movieDAO->GetAll();
        $genres = $this->genresDAO->GetAll();
        require('./presentation/listMovies.php');
    }

    public function showAddMovie($filterGenre = null, $filterName = null, $filterDateFrom = null, $filterDateTo = null){
        $custom_css = "movie-list.css";
        if($filter)
            if($filterGenre == 'default')
                $filterGenre = null;
            if($filterDateFrom == null)
                $filterDateFrom = null;
            if($filterDateTo == null)
                $filterDateTo = date("Y-m-d");
            $data = $this->movieDAO->GetAll();
            $genres = $this->genresDAO->GetAll();        
        require_once("./presentation/addShow.php");
    }

    public function addShowForm($idMovie){
       $cinemaList = $this->CinemaDAO->GetAll();
       require_once("./presentation/addShowForm.php");
    }
    
    public function addShow($idCinema, $date, $time, $ticketValue, $idMovie){
        if($idCinema != "" && $date != "" && $time != "" && $ticketValue != "" && $idMovie != "")
            $this->showDAO->add($idCinema, $idMovie, $date, $time, $ticketValue);
    }

    public function shows($id)
    {
        if($id != ""){
            $showArrays = $showDAO->getAll();
            $movie= $movieDAO->getMovieById($id);
            require_once("./presentation/shows.php");
        }
    }
}