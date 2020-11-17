<?php namespace DAO;

use business\models\Purchase;

use DAO\Database;

require_once("./config/ENV.php");


class purchaseDAO {
    private $purchase = array();

    public function GetAll(){
        $this->purchase = $this->getDBpurchases();
        return $this->purchase;
    }

    public function add($purchase){
        Database::connect();
        return Database::execute('add_purchase', 'OUT', array($purchase->getUser_id(),$purchase->getDiscount(),$purchase->getDate(),$purchase->getTotal()));
    }

    private function getDBPurchase(){
        Database::connect();
        $DBPurchase = Database::execute('get_purchases', 'OUT');
        $DBPurchase = array_map(function ($purchase){
            return new purchase(
                $purchase["id"],
                $purchase["id_user"],
                $purchase["discount"],
                $purchase["date"],
                $purchase["total"]
            );
        }, $DBPurchase);

        return $DBPurchase;
    }

   
}

?>