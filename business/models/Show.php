<?php 
namespace business\models;

class Show{
	private $id;
    private $room;
	private $idMovie;
    private $date;
	private $time;
	
    public function __construct($id, $room, $idMovie, $date, $time){
		$this->id = $id;
        $this->room = $room;
        $this->idMovie = $idMovie;
        $this->date = $date;
		$this->time = $time;
	}
	
	public function getId() {
		return $this->id;
	}

	public function setId($id) {
		$this->id = $id;
	}

	public function setRoom($room){
		$this->room = $room;
	}
	
	public function getRoom(){
		return $this->room;
	}
	
	public function setIdMovie($idMovie){
		$this->idMovie = $idMovie;
	}
	
	public function getIdMovie(){
		return $this->idMovie;
	}

    public function getdate(){
		return $this->date;
	}
	
	public function setdate($date){
		$this->date = $date;
	}
	
    public function getTime(){
		return $this->time;
	}

	public function setTime($time){
		$this->time = $time;
	}

}
