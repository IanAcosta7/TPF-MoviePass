<?php namespace business\controllers;
use DAO\CinemaDAO;
use DAO\MovieDAO;
use business\models\Cinema;

class CinemaController{

    private $cinemaDAO;

    public function __construct() {
        $this->cinemaDAO = new CinemaDAO();
    }

    public function Index($name = null) {
        $custom_css = 'cinema-list.css';

        if ($name)
            $this->cinemaDAO->Delete($name);

        $cinemas = $this->cinemaDAO->GetAll();
        require_once("./presentation/listCinemas.php");   
    }

    public function addCinema($capacity = null, $name = null, $address = null, $id = null) {
        if ($id && $capacity && $name && $address) {
            $cinema = new Cinema($id, $capacity, $name, $address);
    
            $this->cinemaDAO->Add($cinema);

            $this->Index();
        } else {
            require_once("./presentation/addCinema.php");   
        }
    }

}