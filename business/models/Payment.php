<?php

namespace business\models;

class Payment {
    private $id;
    private $id_user;
    private $cred_acc;
    private $auth_code;
    private $date;
    private $total;

    public function __construct($id, $id_user, $cred_acc, $auth_code, $date, $total){
        $this->id = $id;
        $this->id_user = $id_user;
        $this->cred_acc = $cred_acc;
        $this->auth_code = $auth_code;
        $this->date = $date;
        $this->total = $total;
    }

    public function getId(){
		return $this->id;
	}

	public function setId($id){
		$this->id = $id;
	}

	public function getId_user(){
		return $this->id_user;
	}

	public function setId_user($id_user){
		$this->id_user = $id_user;
	}

	public function getCred_acc(){
		return $this->cred_acc;
	}

	public function setCred_acc($cred_acc){
		$this->cred_acc = $cred_acc;
	}

	public function getAuth_code(){
		return $this->auth_code;
	}

	public function setAuth_code($auth_code){
		$this->auth_code = $auth_code;
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