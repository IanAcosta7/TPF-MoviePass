<?php 
namespace business\models;

class Cinema {
	
	private $id;
	private $capacity;
	private $name;
	private $address;
	private $rooms;
	

	function __construct($id, $capacity, $name, $address, $rooms=null){
		$this->id = $id;
		$this->capacity = $capacity;
		$this->name = $name;
		$this->address = $address;
		$this->rooms = $rooms;

	}
	
	public function getRooms() {
		return $this->rooms;
	}

	public function setRooms($rooms) {
		$this->rooms = $rooms;
	}

	public function getId() {
		return $this->id;
	}

	public function setId($id) {
		$this->id = $id;
	}

    public function getCapacity(){
		return $this->capacity;
	}

	public function setCapacity($capacity){
		$this->capacity = $capacity;
	}

	public function getName(){
		return $this->name;
	}

	public function setName($name){
		$this->name = $name;
	}

	public function getAddress(){
		return $this->address;
	}

	public function setAddress($address){
		$this->address = $address;
	}
	
}
 ?>