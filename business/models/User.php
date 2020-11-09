<?php

namespace business\models;

class User {

    private $id;
    private $email;
    private $name;
    private $isAdmin;

    public function __construct($email, $name, $isAdmin, $id = null) {
        $this->id = $id;
        $this->email = $email;
        $this->name = $name;
    }

    public function getId(){
        return $this->id;
    }

    public function setId($id){
        $this->id = $id;
    }

    public function getEmail(){
        return $this->email;
    }

    public function setEmail($email){
        $this->email = $email;
    }

    public function getName(){
        return $this->name;
    }

    public function setName($name){
        $this->name = $name;
    }

    public function isAdmin($isAdmin){
        return $this->isAdmin;
    }
}