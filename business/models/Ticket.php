<?php

namespace business\models;

class Ticket {
    private $id;
    private $purchase;
    private $id_show;
    private $qr;
    
    
    public function __construct($id, $purchase, $id_show, $qr) {
        $this->id = $id;
        $this->purchase = $purchase;
        $this->id_show = $id_show;
        $this->qr = $qr;
    }

    public function getId(){
		return $this->id;
	}

	public function setId($id){
		$this->id = $id;
    }
    
    public function getId_show(){
		return $this->id_show;
	}

	public function setId_show($id_show){
		$this->id_show = $id_show;
	}

	public function getPurchase(){
		return $this->purchase;
	}

	public function setPurchase($purchase){
		$this->purchase = $purchase;
	}

	public function getQr(){
		return $this->qr;
	}

	public function setQr($qr){
		$this->qr = $qr;
	}

	public function amountFromShow($tickets, $id) {
		$c = 0;
		
		foreach ($tickets as $ticket) {
			if ($ticket->getId_show() == $id)
				$c++;
		}

		return $c;
	}
}