<?php namespace business\controllers;

use DAO\TicketDAO;
use DAO\ShowDAO;
use DAO\MovieDAO;

class TicketController {

    private $ticketDAO;
    private $showDAO;

    public function __construct() {
        $this->ticketDAO = new TicketDAO();
        $this->showDAO = new ShowDAO();
        $this->movieDAO = new MovieDAO();
    }

    public function Index() {
        $user = $_SESSION['user'];

        $tickets = $this->ticketDAO->getTicketByUserId($user->getId());
        $shows = array();
        $movies = array();
        $purchases = array();

        foreach ($tickets as $ticket) {
            $curr_show = $this->showDAO->getShowById($ticket->getId_show());

            if (!isset($movies[$curr_show->getMovie()]))
                $movies[$curr_show->getMovie()] = $this->movieDAO->getMovieById($curr_show->getMovie());

            if (!isset($shows[$ticket->getId_show()]))
                $shows[$ticket->getId_show()] = $curr_show;

            if (!isset($purchases[$ticket->getPurchase()->getId()]))
                $purchases[$ticket->getPurchase()->getId()] = $ticket->getPurchase();
        }

        include('./presentation/myTickets.php');
    }
}