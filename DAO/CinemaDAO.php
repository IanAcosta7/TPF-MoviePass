<?php
    namespace DAO;

    use DAO\ICinemaDAO;
    use models\Cinema;
    require_once("./config/ENV.php");

    class CinemaDAO implements ICinemaDAO
    {
        private $cinemaList = array();

        public function Add(Cinema $cinema)
        {
            $this->RetrieveData();
            
            array_push($this->cinemaList, $cinema);

            $this->SaveData();
        }

        public function GetAll()
        {
            $this->RetrieveData();

            return $this->cinemaList;
        }

        private function SaveData()
        {
            $arrayToEncode = array();

            foreach($this->cinemaList as $cinema)
            {
                $valuesArray["capacity"] = $cinema->getCapacity();
                $valuesArray["name"] = $cinema->getName();
                $valuesArray["address"] = $cinema->getAddress();
                
                array_push($arrayToEncode, $valuesArray);
            }

            $jsonContent = json_encode($arrayToEncode, JSON_PRETTY_PRINT);
            
            file_put_contents('https://api.thecinemadb.org/4/list/1?page=1&api_key='. API_key, $jsonContent);
        }

        private function RetrieveData()
        {
            $this->cinemaList = array();
            try{
                $jsonContent = file_get_contents('https://api.thecinemadb.org/4/list/1?page=1&api_key='. API_key);

                $LIST = ($jsonContent) ? json_decode($jsonContent, true) : array();
                
                $arrayToDecode = $LIST["results"];
                

                foreach($arrayToDecode as $valuesArray)
                {
                    $cinema = new cinema();
                    $cinema->setCapacity( $valuesArray["capacity"]);
                    $cinema->setName( $valuesArray["name"]);
                    $cinema->setAddress( $valuesArray["address"]);

                    array_push($this->cinemaList, $cinema);
                }
            }catch(Exception $e){
                print_r($e);
            }
        }

        private function Delete($name){
            
            $this->RetrieveData();

            $this->cinemaList = array_filter($this->cinemaList, function($cinema){
                return $cinema->getName() != $name;
            });

            $this->SaveData();
        }

        private function Update($cinema, $name){

            $this->RetrieveData();

            $this->cinemaList = array_map( function($cine){
               return $cine->getName() == $name ? $cinema : $cine;
            }, $this->cinemaList);

            $this->SaveData();
        }
    }
?>