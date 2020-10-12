<?php namespace controllers;

use controllers\CinemaController;
class HomeController {

    function Index() {
        
        
        $cinemaController =new CinemaController();
        $cinemaController->loadForm("list");
    }


}
?>