<?php 
namespace business\models;

class Show{
	private $idShow;
    private $cinema;
	private $movie;
    private $date;
	private $time;
	private $ticketValue;
	
    public function __construct($idShow, $cinema, $movie, $date, $time, $ticketValue){
		$this->idShow = $idShow;
        $this->cinema = $cinema;
        $this->movie = $movie;
        $this->date = $date;
		$this->time = $time;
		$this->ticketValue = $ticketValue;
	}
	
	public function getIdShow() {
		return $this->idShow;
	}

	public function setIdShow($idShow) {
		$this->idShow = $idShow;
	}

	public function setIdCinema($cinema){
		$this->cinema = $cinema;
	}
	
	public function getIdCinema(){
		return $this->cinema;
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

	public function getTicketValue() {
		return $this->ticketValue;
	}

	public function setTicketValue($ticketValue) {
		$this->ticketValue = $ticketValue;
	}

}
