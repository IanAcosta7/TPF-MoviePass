<?php namespace DAO;

use business\models\Payment;

use DAO\Database;

require_once("./config/ENV.php");


class paymentDAO {
    private $payment = array();

    public function GetAll(){
        $this->payment = $this->getDBPayment();
        return $this->payment;
    }

    public function add($payment){
        Database::connect();
        Database::execute('add_payment', 'IN', array($payment->getId_purchase(), $payment->getCred_acc(), $payment->getAuth_code(), $payment->getTotal(),$payment->getDate()));
    }

    private function getDBPayment(){
        Database::connect();
        $DBPayment = Database::execute('get_payment', 'OUT');
        $DBPayment = array_map(function ($payment){
            $payment = Database::execute('get_payment_by_id', 'OUT', array($payment['id_payment']))[0];
            return new Payment(
                $payment["id"],
                $payment["id_user"],
                $payment["discount"],
                $payment["date"],
                $payment["total"]
            );
        }, $DBPayment);

        return $DBPayment;
    }

   
}

?>