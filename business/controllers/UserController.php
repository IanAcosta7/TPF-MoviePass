<?php

namespace business\controllers;
use business\models\User as User;

class UserController {

    public function Index() {

    }

    public function register(){
        require_once("./presentation/signup.php");
    }

    public function signin($email, $password) {
        
    }

    public function signup($name, $email, $password) {
        $user = new User($email, $name, $password);

        print_r($user);
    }
}