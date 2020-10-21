<?php

namespace controllers;

class UserController {

    public function Index() {
        require_once('./presentation/login.php');
    }

    public function login($email, $password) {
        
    }

    public function signup($name, $email, $password) {
        $user = new User($email, $name, $password);

        
    }
}