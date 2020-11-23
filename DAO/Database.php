<?php namespace DAO;

use \PDO;
use business\exceptions\WebsiteException;

class Database {
    private static $pdo = null;

    public static function connect() {
        if(!Database::$pdo){
            Database::$pdo = new PDO("mysql:host=". DB_SERVERNAME ."; dbname=". DB_NAME, DB_USERNAME, DB_PASSWORD);
            if(!Database::$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION))
                throw new WebsiteException("Error en la conexion a la base de datos", "CONNECTION_ERROR");
        }
    }


    public static function execute($procedure, $type, $array = ''){
        $parameters = "";
        if($array != '') {
            $array = array_map(function ($value) {
                if (gettype($value) === "string")
                    $value = str_replace('"', '&quot;', $value);
                return '"'. $value .'"';
            }, $array);
            
            $parameters = implode(',', $array);
        }
        
        $query = "CALL ". $procedure ."(" . $parameters . ")";
    
        $statement = Database::$pdo->prepare($query);
        if(!$statement->execute())
            throw new WebsiteException("Error en la ejecucion de la base de datos", "EXECUTION_ERROR");
        
        if ($type === 'OUT') {
            $result = $statement->fetchAll();
    
            return $result;
        }
    }
}

?>