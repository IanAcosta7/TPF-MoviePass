<?php namespace business\controllers;

use business\controllers\CinemaController;

class HomeController {

    public function Index() {
        $custom_css = "signin.css";
        require_once('./presentation/signin.php');
    }

}
?>