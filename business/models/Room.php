<?php namespace business\models;

Class Room{
    private $id;
    private $idCinema;
    private $name;
    private $capacity;
    private $price;

    public function __construct($idCinema, $name, $capacity, $price, $id= null){
      $this->name = $name;
      $this->capacity = $capacity;
      $this->price = $price;
      $this->id = $id;
      $this->idCinema = $idCinema;
    }

    public function getId(){
      return $this->id;
    }
  
    public function setId($id){
      $this->id = $id;
    }
    public function getIdCinema(){
      return $this->idCinema;
    }
  
    public function setIdCinema($idCinema){
      $this->idCinema = $idCinema;
    }
  
    public function getName(){
      return $this->name;
    }
  
    public function setName($name){
      $this->name = $name;
    }
  
    public function getCapacity(){
      return $this->capacity;
    }
  
    public function setCapacity($capacity){
      $this->capacity = $capacity;
    }
  
    public function getPrice(){
      return $this->price;
    }
  
    public function setPrice($price){
      $this->price = $price;
    }
}
?>