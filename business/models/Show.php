<?php 
namespace business\models;

class Show{
    private $day;
    private $time;

    public function __constructor($day, $time){
        $this->day = $day;
        $this->time = $time;
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
}
