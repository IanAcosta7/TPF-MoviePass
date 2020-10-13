<?php namespace controllers;
use DAO\MovieDAO;
use DAO\CinemaDAO;

class CinemaController{
    public function loadForm($form)
    {
        $movieDAO = new MovieDAO();
        $data= $movieDAO->GetAll();
        $cinemaDAO=new CinemaDAO();
        $cinemas=$cinemaDAO->GetAll();
        require_once("./presentation/".$form."Cinemas.php");   
        
    }

    public function Delete($name)
    {
        $cinemaDao=new CinemaDAO();
        $cinemas=$cinemaDao->GetAll();
        require_once("./presentation/deleteCinema.php");    
    }
    public function addCinema($cinema)
    {
        $cinemaDao=new CinemaDAO();
        $cinemaDao->addCinema($cinema);
        require_once("./presentation/addCinema.php");    
    }

}