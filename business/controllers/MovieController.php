<?php namespace business\controllers;

use DAO\MovieDAO;
use DAO\GenreDAO;
use DAO\Database;
use DAO\ShowDAO;
use DAO\cinemaDAO;
use DAO\TicketDAO;

class MovieController {

    private $movieDAO;
    private $genres;
    private $showDAO;
    private $cinemaDAO;
    private $ticketDAO;

    public function __construct() {
        $this->movieDAO = new MovieDAO();
        $this->genresDAO = new genreDAO();
        $this->showDAO= new ShowDAO();
        $this->cinemaDAO= new cinemaDAO();
        $this->ticketDAO= new TicketDAO();
    }

    public function Index($filterGenre = null, $filterDate = null) {
        if($filterGenre == 'default')
            $filterGenre = null;
        if ($filterDate == '')
            $filterDate = null;
            try{
                $data = $this->showDAO->GetAll();
                $genres = $this->genresDAO->GetAll();
                require('./presentation/listMovies.php');
            }catch(WebsiteException $e){
                require_once("./presentation/error.php");
            }
        
    }

    public function showAddMovie($filterGenre = null, $filterName = null, $filterDateFrom = null, $filterDateTo = null){
        if($filterGenre == 'default')
            $filterGenre = null;
        if ($filterName == '')
            $filterName = null;
        if($filterDateFrom== '')
            $filterDateFrom = null;
        if($filterDateTo == '')
            $filterDateTo = null;

            try{
                $data = $this->movieDAO->GetAll();
                $genres = $this->genresDAO->GetAll();       
                require_once("./presentation/addShow.php");
            }catch(WebsiteException $e){
                require_once("./presentation/error.php");
            }
    }

    public function addShowForm($idMovie){
        try{
            $cinemaList = $this->cinemaDAO->GetAll();
            require_once("./presentation/addShowForm.php");
        }catch(WebsiteException $e){
            require_once("./presentation/error.php");
        }
    }
    
    public function addShow($idRoom, $date, $time, $idMovie){
        if($idRoom != "" && $date != "" && $time != "" && $idMovie != "")
        {
            try{
                $this->showDAO->add($idRoom, $idMovie, $date, $time);
                header('Location: '. ROOT_CLIENT .'Movie');
            }catch(WebsiteException $e){
                require_once("./presentation/error.php");
            }
        }
    }

    public function shows($id)
    {
        if($id != ""){
            try{
                $showArrays = $this->showDAO->getAll();
                $movie= $this->movieDAO->getMovieById($id);
                $tickets = $this->ticketDAO->getAll();

                $cinemas = array();

                foreach ($showArrays as $show) {
                    $idCinema = $show->getRoom()->getIdCinema();

                    if (!array_key_exists($idCinema, $cinemas) && $show->getMovie()->getId() == $movie->getId())
                        $cinemas[$idCinema] = $this->cinemaDAO->getCinemaById($idCinema);
                }

                require_once("./presentation/shows.php");
            }catch(WebsiteException $e){
                require_once("./presentation/error.php");
            }
        }
    }
}