<?php namespace business\controllers;

    use DAO\MovieDAO;
    use DAO\GenreDAO;
    use DAO\Database;
    use DAO\ShowDAO;
    use DAO\CinemaDAO;
    use DAO\PurchaseDAO;
    use DAO\PaymentDAO;
    use business\models\Purchase;
    use business\models\Payment;

class buyController {

    private $movieDAO;
    private $genres;
    private $showDAO;
    private $CinemaDAO;
    private $ShowDAO;
    private $purchaseDAO;
    private $paymentDAO;

    public function __construct() {
        $this->movieDAO = new MovieDAO();
        $this->genresDAO = new genreDAO();
        $this->showDAO= new ShowDAO();
        $this->CinemaDAO= new CinemaDAO();
        $this->ShowDAO= new ShowDAO();
        $this->purchaseDAO= new purchaseDAO();
        $this->paymentDAO= new PaymentDAO();
    }

    public function Index() {
        
    }

    public function buyTicket($idShow, $card=null, $quantity=null, $cred_acc=null){
        if($card != "" && $quantity != "" && $cred_acc !="" && $card && $quantity && $cred_acc)
        {

            $this->purchaseDAO->add(new Purchase(null, $_SESSION["user"]->getId(), 0, date('Y-m-d'), ($this->ShowDAO->getShowByID($idShow)->getTicketValue() * $quantity)));
            $this->paymentDAO->add(new Payment(null, null, $cred_acc, null, date('Y-m-d'),($this->ShowDAO->getShowByID($idShow)->getTicketValue() * $quantity)));


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