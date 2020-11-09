<?php

namespace business\controllers;
use business\models\User as User;
use DAO\UserDAO;

class UserController {
    
    private $userDAO;

    public function __construct() {
        $this->userDAO = new UserDAO();
    }

    public function register(){
        require_once("./presentation/signup.php");
    }

    public function signin($email, $password) {
        
    }

    public function signup($name, $email, $password) {
        if($name != "" && $email!="" && $password!=""){
            try{
                $this->userDAO->add($email, $name, $password);
                header('Location: '. ROOT_CLIENT);
            }catch(DatabaseException $e){
                require_once("./presentation/error.php");
            }

        }
        

    }
}