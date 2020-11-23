<?php namespace business\controllers;

use business\controllers\CinemaController;
use business\models\User as User;
use DAO\UserDAO;

class HomeController {

    private $userDAO;

    public function __construct() {
        $this->userDAO = new UserDAO();
    }

    public function Index() {
        if (!isset($_SESSION['user']))
            require_once('./presentation/signin.php');
        else 
            header('Location: '.ROOT_CLIENT.'Movie');
    }

    public function register(){
        require_once("./presentation/signup.php");
    }

    public function signin($email, $password) {
        try {
            $user = $this->userDAO->signIn($email, $password);

            if($user){
                $_SESSION['user'] = $user;
                $_SESSION['admin'] = $user->isAdmin();
                header('Location: '. ROOT_CLIENT . 'Movie');
            }else{
                header('Location: '. ROOT_CLIENT);
            }

        } catch (WebsiteException $e) {
            require_once("./presentation/error.php");
        }
    }

    public function signup($name, $email, $password) {
        if($name != "" && $email!="" && $password!=""){
            try{
                $this->userDAO->add($email, $name, $password);
                header('Location: '. ROOT_CLIENT);
            }catch(WebsiteException $e){
                require_once("./presentation/error.php");
            }
        }
    }

    public function logout(){
        session_destroy();
        header('Location: '.ROOT_CLIENT);
    }

}
?>