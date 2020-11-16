<?php

namespace bussiness\models;

class Ticket {
    private $id;
    private $id_purchase;
    private $number;
    private $qr;
    
    
    public function __construct($id, $id_purchase, $number, $qr) {
        $this->id = $id;
        $this->id_purchase = $id_purchase;
        $this->number = $number;
        $this->qr = $qr;
    }

    public function getId(){
		return $this->id;
	}

	public function setId($id){
		$this->id = $id;
	}

	public function getId_purchase(){
		return $this->id_purchase;
	}

	public function setId_purchase($id_purchase){
		$this->id_purchase = $id_purchase;
	}

	public function getNumber(){
		return $this->number;
	}

	public function setNumber($number){
		$this->number = $number;
	}

	public function getQr(){
		return $this->qr;
	}

	public function setQr($qr){
		$this->qr = $qr;
	}
}