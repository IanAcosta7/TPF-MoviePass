<?php 
namespace modelsBusinessObject;

class Cinema{
	
	private $capacity;
	private $name;
	private $address;
	

	function __construct($capacity, $name, $address){
		$this->capacity = $capacity;
		$this->name = $name;
		$this->address = $address;
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