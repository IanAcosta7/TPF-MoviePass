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

    public function Index($filterGenre = null, $filterDate = null) {
        $custom_css = 'movie-list.css';

        if($filterGenre == 'default')
            $filterGenre = null;
        if ($filterDate == '')
            $filterDate = null;

        $data = $this->showDAO->GetAll();
        $genres = $this->genresDAO->GetAll();
        require('./presentation/listMovies.php');
    }

    public function showAddMovie($filterGenre = null, $filterName = null, $filterDateFrom = null, $filterDateTo = null){
        $custom_css = "movie-list.css";

        if($filterGenre == 'default')
            $filterGenre = null;
        if ($filterName == '')
            $filterName = null;
        if($filterDateFrom== '')
            $filterDateFrom = null;
        if($filterDateTo == '')
            $filterDateTo = null;

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

        header('Location: '. ROOT_CLIENT .'Movie');
    }

    public function shows($id)
    {
        $custom_css = "shows.css";

        if($id != ""){
            $showArrays = $this->showDAO->getAll();
            $movie= $this->movieDAO->getMovieById($id);
            require_once("./presentation/shows.php");
        }
    }
}