<?php namespace controllers;

class CinemaController{
    public function loadForm($form)
    {
        $data=array();
        require_once("./presentation/".$form."Cinema.php");      
    }

}