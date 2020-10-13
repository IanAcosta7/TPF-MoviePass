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

    public function Index() {
        $data = $this->movieDAO->GetAll();
        $genres = $this->genresDAO->GetAll();
        require('./presentation/listMovies.php');
    }

}