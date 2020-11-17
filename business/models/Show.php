<?php 
namespace business\models;

class Show{
	private $idShow;
    private $room;
	private $movie;
    private $date;
	private $time;
	
    public function __construct($idShow, $room, $movie, $date, $time){
		$this->idShow = $idShow;
        $this->room = $room;
        $this->movie = $movie;
        $this->date = $date;
		$this->time = $time;
	}
	
	public function getIdShow() {
		return $this->idShow;
	}

	public function setIdShow($idShow) {
		$this->idShow = $idShow;
	}

	public function setRoom($room){
		$this->room = $room;
	}
	
	public function getRoom(){
		return $this->room;
	}
	
	public function setMovie($movie){
		$this->movie = $movie;
	}
	
	public function getMovie(){
		return $this->movie;
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
