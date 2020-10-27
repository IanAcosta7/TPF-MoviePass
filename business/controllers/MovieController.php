<?php namespace business\controllers;

use DAO\MovieDAO;
use DAO\GenreDAO;

class MovieController {

    private $movieDAO;
    private $genres;

    public function __construct() {
        $this->movieDAO = new MovieDAO();
        $this->genresDAO = new genreDAO();
    }

    public function Index($filterGenre = null) {
        if($filterGenre == 'default')
            $filterGenre = null;
        $data = $this->movieDAO->GetAll();
        $genres = $this->genresDAO->GetAll();
        require('./presentation/listMovies.php');
    }

    public function showAddMovie($filterGenre = null, $filterName = null, $filterDateFrom = null, $filterDateTo = null)
    {
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

}