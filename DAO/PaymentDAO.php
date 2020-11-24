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
        Database::execute('add_payment', 'IN', array($payment->getCred_acc()->getCompany(), $payment->getAuth_code(), $payment->getTotal(),$payment->getDate()));
    }

    private function getDBPayment(){
        Database::connect();
        $DBPayment = Database::execute('get_payment', 'OUT');
        $DBPayment = array_map(function ($payment){
            $cred_acc = Database::execute('get_credit_account_by_id', 'OUT', array($payment["id_credit_account"]));
            return new Payment(
                $payment["id"],
                $payment["id_user"],
                new CreditAccount(
                    $cred_acc["id_credit_account"],
                    $cred_acc["company"]
                ), 
                $payment["auth_code"], 
                $payment["date"], 
                $payment["total"]
            );
        }, $DBPayment);

        return $DBPayment;
    }

   
}

?>