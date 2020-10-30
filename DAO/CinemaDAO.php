<?php
    namespace DAO;

    use DAO\ICinemaDAO;
    use business\models\Cinema;
    require_once("./config/ENV.php");

    class CinemaDAO implements ICinemaDAO
    {
        private $cinemaList = array();

        public function Add($cinema)
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
                $valuesArray["id"] = $cinema->getId();
                $valuesArray["capacity"] = $cinema->getCapacity();
                $valuesArray["name"] = $cinema->getName();
                $valuesArray["address"] = $cinema->getAddress();
                
                array_push($arrayToEncode, $valuesArray);
            }

            $jsonContent = json_encode($arrayToEncode, JSON_PRETTY_PRINT);
            
            file_put_contents('./data/cinemas.json', $jsonContent);
        }

        private function RetrieveData()
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
        }

        public function Delete($id){
            $this->RetrieveData();

            $this->cinemaList = array_filter($this->cinemaList, function($cinema) use ($id) {
                return $cinema->getId() != $id;
            });

            $this->SaveData();
        }

        public function Update($id, $cinema){
            $this->RetrieveData();

            $this->cinemaList = array_map( function($cine) use ($id, $cinema) {
               return $cine->getId() == $id ? $cinema : $cine;
            }, $this->cinemaList);

            $this->SaveData();
        }
    }
?>