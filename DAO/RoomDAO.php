<?php
    namespace DAO;

    use DAO\IRoomDAO;
    use DAO\Database;
    use business\models\Room;
    require_once("./config/ENV.php");

    class RoomDAO implements IRoomDAO
    {
        private $¿roomList = array();

        public function Add($room)
        {
            Database::connect();
            
            $array = Database::execute("check_room", "OUT", array($room->getId()));
            if(empty($array))
                Database::execute("add_room", "IN", array($room->getName(), $room->getCapacity(), $cinema->getprice()));
        }
        
        public function GetAll()
        {
            Database::connect();
            
            $DBRoom = Database::execute("get_room", "OUT");
            $DBRoom = array_map(function($room){
                return new Room($room["id_room"],$room["name"],$room["capacity"],$room["price"]);
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
            return new Room($cinema["id_room"], $cinema["name"], $cinema["capacity"], $cinema["price"]);
        }
    }
?>