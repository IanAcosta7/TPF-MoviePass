<?php
    namespace DAO;

    use DAO\IRoomDAO;
    use DAO\Database;
    use business\models\Room;
    require_once("./config/ENV.php");

    class RoomDAO implements IRoomDAO
    {
        private $roomList = array();

        public function Add($room)
        {
            Database::connect();
            $array = Database::execute("check_room", "OUT", array($room->getName(), $room->getIdCinema()));
            if(empty($array))
                Database::execute("add_room", "IN", array($room->getIdCinema(),$room->getName(), $room->getCapacity(), $room->getPrice()));
        }
        
        public function GetAll()
        {
            Database::connect();
            
            $DBRoom = Database::execute("get_rooms", "OUT");
            $DBRoom = array_map(function($room){
                return new Room($room["id_cinema"], $room["name"],$room["capacity"],$room["price"], $room["id_room"]);
            },$DBRoom);
            
            return $DBRoom;
            
        }
        public function Delete($id){
            Database::connect();
            Database::execute("delete_room","IN", array($id));
        }

        public function getRoomById($id)
        {
            Database::connect();
            $room = Database::execute("get_room_by_id","OUT", array($id))[0];
            return new Room($room["id_cinema"], $room["id_room"], $room["name"], $room["capacity"], $room["price"]);
        }
    }
?>