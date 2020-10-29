<?php namespace DAO;

use models\Show;
use DAO\Database;

class ShowDAO {
    private $shows = array();

    public function GetAll()
    {
        $this->RetrieveData();

        return $this->shows;
    }

    public function add($idCinema, $idMovie, $date, $time, $ticketValue)
    {
        Database::connect();
        Database::execute('add_show', array($idCinema, $idMovie, $date, $time, $ticketValue));
    }

    private function RetrieveData()
    {
        $this->shows = array();
        try{
            $database = new Database();
            $database->connect();

            // $database->execute('get_shows');

            

        }catch(Exception $e){
            print_r($e);
        }
    }
}

?>