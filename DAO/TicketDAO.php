<?php namespace DAO;

use business\models\Payment;
use business\models\Ticket;
use business\models\Purchase;

use DAO\Database;

require_once("./config/ENV.php");


class ticketDAO {
    private $ticket = array();

    public function GetAll(){
        $this->ticket = $this->getDBTicket();
        return $this->ticket;
    }

    public function add($ticket, $id_purchase){
        Database::connect();
        Database::execute('add_ticket', 'IN', array($id_purchase, $ticket->getId_show(), $ticket->getQr()));
    }

    public function getTicketByUserId($id) {
        Database::connect();
        $DBTickets = Database::execute('get_tickets_by_user_id', 'OUT', array($id));

        $DBTickets = array_map(function ($ticket) {
            $DBPurchase = Database::execute('get_purchase_by_id', 'OUT', array($ticket['id_purchase']))[0];
            return new Ticket(
                $ticket["id_ticket"],
                new Purchase($DBPurchase['id_purchase'], $DBPurchase['id_user'], $DBPurchase['discount'], $DBPurchase['date'], $DBPurchase['total']),
                $ticket["id_show"],
                $ticket["qr"]
            );
        }, $DBTickets);

        return $DBTickets;
    }

    private function getDBTicket(){
        Database::connect();
        $DBTicket = Database::execute('get_tickets', 'OUT');
        $DBTicket = array_map(function ($ticket){
            $DBPurchase = Database::execute('get_purchase_by_id', 'OUT', array($ticket['id_purchase']))[0];
            return new Ticket(
                $ticket["id_ticket"],
                new Purchase($DBPurchase['id_purchase'], $DBPurchase['id_user'], $DBPurchase['discount'], $DBPurchase['date'], $DBPurchase['total']),
                $ticket["id_show"],
                $ticket["qr"]
            );
        }, $DBTicket);

        return $DBTicket;
    }
}

?>