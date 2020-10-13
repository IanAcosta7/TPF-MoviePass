<?php namespace controllers;
use DAO\MovieDAO;

class CinemaController{
    public function loadForm($form)
    {
        $movieDAO = new MovieDAO();
        $data= $movieDAO->GetAll();
        require_once("./presentation/".$form."Cinema.php");      
    }

}