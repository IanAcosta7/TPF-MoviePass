<?php

namespace business\models;

class User {

    private $id;
    private $email;
    private $name;
    private $password;

    public function __construct($email, $name, $password, $id = null) {
        $this->id = $id;
        $this->email = $email;
        $this->name = $name;
        $this->password = $password;
    }
}