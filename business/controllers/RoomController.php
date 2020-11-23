<?php namespace business\controllers;
use DAO\RoomDAO;
use business\models\Room;

class RoomController{

    private $roomDAO;

    public function __construct() {
        $this->roomDAO = new RoomDAO();
    }

    public function addRoom($id_cinema = null, $name = null, $capacity = null, $price = null) {
        if ($capacity && $name && $price && $capacity!= "" && $name != "" && $price !="") {
            $room = new Room($id_cinema, $name, $capacity, $price);

            try{
                $this->roomDAO->Add($room);
                header("Location: ". ROOT_CLIENT . "Cinema");
            }catch(WebsiteException $e){
                require_once("./presentation/error.php");
            }
        } else {
            require_once("./presentation/addRoom.php");   
        }
    }

    public function deleteRoom($id) {
        try {
            $this->roomDAO->delete($id);
        } catch (Exception $e) {

        }
        header("Location: ". ROOT_CLIENT ."Cinema");
    }

}