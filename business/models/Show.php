<?php 
namespace business\models;

class Show{
    private $day;
    private $time;
    private $cinema;
    private $idMovie;

    public function __constructor($day, $time, $cinema, $idMovie){
        $this->day = $day;
        $this->time = $time;
        $this->cinema = $cinema;
        $this->idMovie = $idMovie;
    }

    public function getDay(){
		return $this->day;
	}

	public function setDay($day){
		$this->day = $day;
	}
    public function getTime(){
		return $this->time;
	}
	public function setTime($time){
		$this->time = $time;
	}
	public function setCinema($cinema){
		$this->cinema = $cinema;
	}
    public function getCinema(){
		return $this->cinema;
	}

	public function setIdMovie($idMovie){
		$this->idMovie = $idMovie;
	}
    public function getIdMovie(){
		return $this->idMovie;
	}

	
}
