<?php
    namespace DAO;

    use DAO\ICinemaDAO;
    use DAO\Database;
    use business\models\Cinema;
    require_once("./config/ENV.php");

    class CinemaDAO implements ICinemaDAO
    {
        private $cinemaList = array();

        public function Add($cinema)
        {
            Database::connect();
            
            $array = Database::execute("check_cinema", "OUT", array($cinema->getName(),$cinema->getAddress()));
            if(empty($array))
                Database::execute("add_cinema", "IN", array($cinema->getName(), $cinema->getCapacity(), $cinema->getAddress()));
        }
        
        public function GetAll()
        {
            Database::connect();
            
            $DBCinemas = Database::execute("get_cinemas", "OUT");
            $DBCinemas = array_map(function($cinema){
                return new Cinema($cinema["id_cinema"],$cinema["capacity"],$cinema["cinema_name"],$cinema["address"]);
            },$DBCinemas);
            
            return $DBCinemas;
            
        }
        public function Delete($id){
            Database::connect();
            Database::execute("delete_cinema","IN", array($id));
        }

        public function getCinemaById($id)
        {
            Database::connect();
            $cinema = Database::execute("get_cinema_by_id","OUT", array($id))[0];
            return new Cinema($cinema["id_cinema"], $cinema["capacity"], $cinema["cinema_name"], $cinema["address"]);
        }
        
        //private function saveInDatabase(Cinema $cinema){
        //}
        
        
        
        
        /*private function SaveData()
        {
            Database::connect();
            

            foreach($this->cinemaList as $cinema)
            {
                $valuesArray["id"] = $cinema->getId();
                $valuesArray["capacity"] = $cinema->getCapacity();
                $valuesArray["name"] = $cinema->getName();
                $valuesArray["address"] = $cinema->getAddress();
                
                array_push($arrayToEncode, $valuesArray);
            }

            $jsonContent = json_encode($arrayToEncode, JSON_PRETTY_PRINT);
            
            file_put_contents('./data/cinemas.json', $jsonContent);
        }*/

        /*private function RetrieveData()
        {
            $this->cinemaList = array();
            try{
                $jsonContent = file_get_contents('./data/cinemas.json');

                $arrayToDecode = ($jsonContent) ? json_decode($jsonContent, true) : array();

                foreach($arrayToDecode as $valuesArray)
                {
                    $cinema = new Cinema($valuesArray["id"], $valuesArray["capacity"], $valuesArray["name"], $valuesArray["address"]);

                    array_push($this->cinemaList, $cinema);
                }
            }catch(Exception $e){
                print_r($e);
            }
        }*/


        public function Update($id, $cinema){
            $this->RetrieveData();

            $this->cinemaList = array_map( function($cine) use ($id, $cinema) {
               return $cine->getId() == $id ? $cinema : $cine;
            }, $this->cinemaList);

            $this->SaveData();
        }
    }
?>