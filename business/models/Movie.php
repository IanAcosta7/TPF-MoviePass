<?php 
namespace business\models;

class Movie{
	
	private $id;
	private $poster_path;
	private $popularity;
	private $vote_count;
	private $adult;
	private $backdrop_path;
	private $original_language;
	private $original_title;
	private $genre_ids;
	private $title;
	private $vote_average;
	private $overview;
    private $release_date;

    public function getId(){
		return $this->id;
	}

	public function setId($id){
		$this->id = $id;
	}

    public function getPoster_path(){
		return $this->poster_path;
	}

	public function setPoster_path($poster_path){
		$this->poster_path = $poster_path;
	}

	public function getPopularity(){
		return $this->popularity;
	}

	public function setPopularity($popularity){
		$this->popularity = $popularity;
	}

	public function getVote_count(){
		return $this->vote_count;
	}

	public function setVote_count($vote_count){
		$this->vote_count = $vote_count;
	}

	public function getAdult(){
		return $this->adult;
	}

	public function setAdult($adult){
		$this->adult = $adult;
	}

	public function getBackdrop_path(){
		return $this->backdrop_path;
	}

	public function setBackdrop_path($backdrop_path){
		$this->backdrop_path = $backdrop_path;
	}

	public function getOriginal_language(){
		return $this->original_language;
	}

	public function setOriginal_language($original_language){
		$this->original_language = $original_language;
	}

	public function getOriginal_title(){
		return $this->original_title;
	}

	public function setOriginal_title($original_title){
		$this->original_title = $original_title;
	}

	public function getGenre_ids(){
		return $this->genre_ids;
	}

	public function setGenre_ids($genre_ids){
		$this->genre_ids = $genre_ids;
	}

	public function getTitle(){
		return $this->title;
	}

	public function setTitle($title){
		$this->title = $title;
	}

	public function getVote_average(){
		return $this->vote_average;
	}

	public function setVote_average($vote_average){
		$this->vote_average = $vote_average;
	}

	public function getOverview(){
		return $this->overview;
	}

	public function setOverview($overview){
		$this->overview = $overview;
	}

	public function getRelease_date(){
		return $this->release_date;
	}

	public function setRelease_date($release_date){
		$this->release_date = $release_date;
	}
}
    
?>
    

	

	