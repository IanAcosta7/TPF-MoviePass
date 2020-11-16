<?php namespace business\controllers;

use DAO\MovieDAO;
    use DAO\GenreDAO;
    use DAO\Database;
    use DAO\ShowDAO;
    use DAO\CinemaDAO;

class buyController {

    private $movieDAO;
    private $genres;
    private $showDAO;
    private $CinemaDAO;
    private $ShowDAO;

    public function __construct() {
        $this->movieDAO = new MovieDAO();
        $this->genresDAO = new genreDAO();
        $this->showDAO= new ShowDAO();
        $this->CinemaDAO= new CinemaDAO();
        $this->ShowDAO= new ShowDAO();
    }

    public function Index() {
        
    }

    public function buyTicket($idShow, $card=null, $quantity=null){
        if($card != "" && $quantity != "" && $card && $quantity)
        {
            header("Location: ". ROOT_CLIENT . "Movie");
        }else{
            try{
                $show = $this->ShowDAO->getShowByID($idShow);
                
                require_once("./presentation/buyForm.php");
        
            }catch(DatabaseException $e){
                require_once("./presentation/error.php");
            }
            
        }

        
    }

    

    


}
?>