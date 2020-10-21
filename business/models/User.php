<?php

namespace models;

class User {

    private $email;
    private $name;
    private $password;

    public function __construct($email, $name, $password) {
        $this->email = $email;
        $this->name = $name;
        $this->password = $password;
    }
}