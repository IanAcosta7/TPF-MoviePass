<?php namespace business\controllers;

    use DAO\MovieDAO;
    use DAO\GenreDAO;
    use DAO\Database;
    use DAO\ShowDAO;
    use DAO\CinemaDAO;
    use DAO\PurchaseDAO;
    use DAO\PaymentDAO;
    use DAO\CreditAccountDAO;
    use DAO\TicketDAO;
    use business\models\Purchase;
    use business\models\CreditAccount;
    use business\models\Payment;
    use business\models\Ticket;

class buyController {

    private $movieDAO;
    private $genres;
    private $showDAO;
    private $CinemaDAO;
    private $ShowDAO;
    private $purchaseDAO;
    private $paymentDAO;
    private $creditAccountDAO;
    private $ticketDAO;

    public function __construct() {
        $this->movieDAO = new MovieDAO();
        $this->genresDAO = new genreDAO();
        $this->showDAO= new ShowDAO();
        $this->CinemaDAO= new CinemaDAO();
        $this->ShowDAO= new ShowDAO();
        $this->purchaseDAO= new purchaseDAO();
        $this->paymentDAO= new PaymentDAO();
        $this->creditAccountDAO= new CreditAccountDAO();
        $this->ticketDAO= new TicketDAO();
    }

    public function Index() {
        
    }

    public function buyTicket($idShow, $card=null, $quantity=null){
        if($card != "" && $quantity != "" && $card && $quantity)
        {
            $show = $this->showDAO->getShowById($idShow);
            $tickets = $this->ticketDAO->getAll();
            if ($quantity < $show->getRoom()->getCapacity() - Ticket::amountFromShow($tickets, $show->getId())) {
                $id = $this->purchaseDAO->add(new Purchase(null, $_SESSION["user"]->getId(), 0, date('Y-m-d'), ($this->ShowDAO->getShowByID($idShow)->getRoom()->getPrice() * $quantity)))[0]['id'];
                $this->paymentDAO->add(new Payment(null, $id, new CreditAccount(null, $card), 65553489, date('Y-m-d'),($this->ShowDAO->getShowByID($idShow)->getRoom()->getPrice() * $quantity)));
                
                for ($i = 0; $i < $quantity; $i++) {
                    $this->ticketDAO->add(new Ticket(null, $id, $idShow, $i));
                }
            }

            header("Location: ". ROOT_CLIENT . "Movie");
        }else{
            try{
                $show = $this->ShowDAO->getShowByID($idShow);
                $credit_accounts = $this->creditAccountDAO->getAll();
                
                require_once("./presentation/buyForm.php");
        
            }catch(WebsiteException $e){
                require_once("./presentation/error.php");
            }
            
        }

        
    }

}
?>