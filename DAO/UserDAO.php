<?php namespace DAO;

use business\models\User;
use DAO\Database;

require_once("./config/ENV.php");

class UserDAO {
    private $users = array();

    public function add($email, $name, $password){
        Database::connect();
        Database::execute('add_user', 'IN', array($email, $name, $password));
    }

    private function getUserById(){
        Database::connect();
        $DBUser = Database::execute("get_user_by_id", "OUT", array($id))[0];
        return new User($user["id_user"], $user["email_user"], $user["name_user"], $user["password_user"]);
    }

    private function delete($id){
        Database::connect();
        Database::execute("delete_user", "IN", array($id));
    }
}