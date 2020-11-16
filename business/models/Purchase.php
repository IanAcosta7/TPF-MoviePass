<?php

namespace business\models;

class Purchase {
    private $id;
    private $tickets;
    private $payment;
    private $user_id;
    private $discount;
    private $date;
    private $total;

    public function __construct($id, $tickets, $payment, $user_id, $discount, $date, $total) {
        $this->id = $id;
        $this->tickets = $tickets;
        $this->payment = $payment;
        $this->user_id = $user_id;
        $this->discount = $discount;
        $this->date = $date;
        $this->total = $total;
    }

	public function getPayment(){
		return $this->payment;
	}

	public function setPayment($payment){
		$this->payment = $payment;
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

    public function gettickets(){
		return $this->tickets;
	}

	public function settickets($tickets){
		$this->tickets = $tickets;
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