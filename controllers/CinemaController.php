<?php namespace controllers;
use DAO\CinemaDAO;
use DAO\MovieDAO;
use models\Cinema;

class CinemaController{

    private $cinemaDAO;

    public function __construct() {
        $this->cinemaDAO = new CinemaDAO();
    }

    public function Index() {
        $cinemas = $this->cinemaDAO->GetAll();
        require_once("./presentation/listCinemas.php");   
    }

    public function Delete($name = null) {
        if ($name)
            $this->cinemaDAO->Delete($name);

        $this->Index();  
    }

    public function addCinema($capacity = null, $name = null, $address = null) {
        if ($capacity && $name && $address) {
            $cinema = new Cinema($capacity, $name, $address);
    
            $this->cinemaDAO->Add($cinema);

            $this->Index();
        } else {
            require_once("./presentation/addCinema.php");   
        }
    }

}