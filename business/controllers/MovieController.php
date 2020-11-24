<?php namespace business\controllers;

use DAO\MovieDAO;
use DAO\GenreDAO;
use DAO\Database;
use DAO\ShowDAO;
use DAO\CinemaDAO;
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
        $this->cinemaDAO= new CinemaDAO();
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
                $err_string = $this->showDAO->add($idRoom, $idMovie, $date, $time);

                if ($err_string) {
                    $alertMessage = $err_string;
                    $redirectUrl = 'Movie/showAddMovie';
                } else {
                    $alertMessage = 'Función añadida con éxito.';
                    $redirectUrl = 'Movie';
                }

                include(ROOT."presentation/alert.php");
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

                    if (!array_key_exists($idCinema, $cinemas) && $show->getMovie()->getId() == $movie->getId() && $show->getDate() >= date('Y-m-d'))
                        $cinemas[$idCinema] = $this->cinemaDAO->getCinemaById($idCinema);
                }

                require_once("./presentation/shows.php");
            }catch(WebsiteException $e){
                require_once("./presentation/error.php");
            }
        }
    }
}