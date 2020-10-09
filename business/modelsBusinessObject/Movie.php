<?php 
namespace modelsBusinessObject;

class Movie{
	
	private $poster_path;
	private $popularity;
	private $vote_count;
	private $video;
	private $media_type;
	private $adult;
	private $backdrop_path;
	private $original_language;
	private $original_title;
	private $genre_ids;
	private $title;
	private $vote_average;
	private $overview;
    private $release_data;


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

	public function getVideo(){
		return $this->video;
	}

	public function setVideo($video){
		$this->video = $video;
	}

	public function getMedia_type(){
		return $this->media_type;
	}

	public function setMedia_type($media_type){
		$this->media_type = $media_type;
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

	public function getRelease_data(){
		return $this->release_data;
	}

	public function setRelease_data($release_data){
		$this->release_data = $release_data;
    }
    
    ?>
    

	

	