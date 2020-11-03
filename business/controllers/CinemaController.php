<?php namespace business\controllers;
use DAO\CinemaDAO;
use DAO\MovieDAO;
use business\models\Cinema;

class CinemaController{

    private $cinemaDAO;

    public function __construct() {
        $this->cinemaDAO = new CinemaDAO();
    }

    public function Index($id = null) {
        $custom_css = 'cinema-list.css';

        if ($id)
            $this->cinemaDAO->Delete($id);

        $cinemas = $this->cinemaDAO->GetAll();
        require_once("./presentation/listCinemas.php");   
    }

    public function addCinema($capacity = null, $name = null, $address = null) {
        if ($capacity && $name && $address && $capacity!= "" && $name != "" && $address !="") {
            $cinema = new Cinema(null, $capacity, $name, $address);
    
            $this->cinemaDAO->Add($cinema);

            header("Location: ". ROOT_CLIENT . "Cinema");
        } else {
            require_once("./presentation/addCinema.php");   
        }
    }

}