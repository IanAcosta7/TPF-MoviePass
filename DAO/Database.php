<?php namespace DAO;

class Database {
    private static $conn;
    public static function connect() {
        Database::$conn = mysqli_connect(DB_SERVERNAME, DB_USERNAME, DB_PASSWORD, DB_NAME);

        if (!Database::$conn) {
            die("Database Connection failed:" . mysqli_connect_error());
        }
    }

    public static function execute($procedure){
        $result = mysqli_query(Database::$conn, 'CALL ' . $procedure . '()');
        if(!$result){
            echo mysqli_error(Database::$conn);
        }
        return mysqli_store_result(Database::$conn);
    }
}

?>