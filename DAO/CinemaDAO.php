<?php
    namespace DAO;

    use DAO\ICinemaDAO;
    use DAO\Database;
    use business\models\Cinema;
    use business\models\Room;
    
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
                $DBRooms= Database::execute("get_rooms_by_cinema_id", "OUT",array($cinema["id_cinema"]));
                return new Cinema(
                    $cinema["id_cinema"],
                    $cinema["capacity"],
                    $cinema["cinema_name"],
                    $cinema["address"],
                    array_map(function($room){
                        return new Room($room["id_cinema"], $room["room_name"], $room["room_capacity"], $room["room_price"], $room["id_room"]);
                    },$DBRooms));
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
            $DBCinema = Database::execute("get_cinema_by_id","OUT", array($id))[0];
            return new Cinema(
                $cinema["id_cinema"],
                $cinema["capacity"],
                $cinema["cinema_name"],
                $cinema["address"],
                array_map(function($room){
                    return new Room($room["id_cinema"], $room["room_name"], $room["room_capacity"], $room["room_price"], $room["id_room"]);
                },$DBRooms));
        }
        
    } 
?>