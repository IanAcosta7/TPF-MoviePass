<?php namespace DAO;

use business\models\User;
use DAO\Database;

require_once("./config/ENV.php");

class UserDAO {
    private $users = array();

    public function add($email, $name, $password){
        Database::connect();
        Database::execute('add_user', 'IN', array($email, $name, hash('sha256', $password)));
    }

    public function getUserById($id){
        Database::connect();
        $DBUser = Database::execute("get_user_by_id", "OUT", array($id))[0];
        return new User($DBUser["email_user"], $DBUser["name_user"], $DBUser["is_admin"] == 1, $DBUser["id_user"]);
    }

    public function signIn($email, $password){
            Database::connect();
            $DBUser = Database::execute("signin", "OUT", array($email, hash('sha256', $password)));
            if(!empty($DBUser)){
                $DBUser = $DBUser[0];
                return new User($DBUser["email_user"], $DBUser["name_user"], $DBUser["is_admin"] == 1, $DBUser["id_user"]);
            }
            else
                return null;
    }

    public function delete($id){
        Database::connect();
        Database::execute("delete_user", "IN", array($id));
    }
}