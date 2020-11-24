<?php

namespace business\models;

class Purchase {
    private $id;
    private $user_id;
    private $discount;
    private $date;
    private $total;

    public function __construct($id, $user_id, $discount, $date, $total) {
        $this->id = $id;
        $this->user_id = $user_id;
        $this->discount = $discount;
        $this->date = $date;
        $this->total = $total;
    }

    public function getId(){
		return $this->id;
	}

	public function setId($id){
		$this->id = $id;
    }
    
    public function getUser_id(){
		return $this->user_id;
	}

	public function setUser_id($user_id){
		$this->user_id = $user_id;
	}

	public function getDiscount(){
		return $this->discount;
	}

	public function setDiscount($discount){
		$this->discount = $discount;
	}

	public function getDate(){
		return $this->date;
	}

	public function setDate($date){
		$this->date = $date;
	}

	public function getTotal(){
		return $this->total;
	}

	public function setTotal($total){
		$this->total = $total;
	}
}