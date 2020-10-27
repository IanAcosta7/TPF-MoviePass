<?php namespace DAO;

class Database {
    public function connect() {
        $conn = mysqli_connect(DB_SERVERNAME, DB_USERNAME, DB_PASSWORD, DB_NAME);

        if (!$conn) {
            die("Database Connection failed:" . mysqli_connect_error());
        }
    }
}

?>