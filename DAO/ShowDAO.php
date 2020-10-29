<?php namespace DAO;

use models\Show;

class ShowDAO {
    private $shows = array();

    public function GetAll()
    {
        $this->RetrieveData();

        return $this->shows;
    }

    public function add($show)
    {
        //implemetar BDD
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