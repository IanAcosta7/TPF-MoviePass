<?php namespace DAO;

use \PDO;

class Database {
    private static $pdo = null;

    public static function connect() {
        if(!Database::$pdo){
            try {
                Database::$pdo = new PDO("mysql:host=". DB_SERVERNAME ."; dbname=". DB_NAME, DB_USERNAME, DB_PASSWORD);
                Database::$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            } catch(Exception $e) {
                die('Error en la base de datos: ' . $e);
            }   
        }
    }


    public static function execute($procedure, $array = ''){
        
        if($array != ''){
            $array = implode(',', $array);
        }
        $statement = Database::$pdo->prepare("CALL ". $procedure ."(" . $array . ")");
        $statement->execute();

        $result = $statement->fetchAll();
        return $result;
    }
}

?>