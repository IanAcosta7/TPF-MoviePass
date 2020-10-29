<?php 
namespace business\models;

class Show{
	private $id;
    private $idCinema;
	private $idMovie;
    private $date;
	private $time;
	private $ticketValue;
	
    public function __constructor($id, $idCinema, $idMovie, $date, $time, $ticketValue){
		$this->id = $id;
        $this->idCinema = $idCinema;
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

	public function setIdCinema($idCinema){
		$this->idCinema = $idCinema;
	}
	
	public function getIdCinema(){
		return $this->idCinema;
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

	private function getTicketValue() {
		return $this->ticketValue;
	}

	private function setTicketValue($ticketValue) {
		$this->ticketValue = $ticketValue;
	}

}
