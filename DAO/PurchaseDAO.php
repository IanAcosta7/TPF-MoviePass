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
        Database::execute('add_purchase', 'IN', array($purchase->getUser_id(),$purchase->getDiscount(),$purchase->getDate(),$purchase->getTotal()));
    }

    private function getDBPurchase(){
        Database::connect();
        $DBPurchase = Database::execute('get_purchases', 'OUT');
        $DBPurchase = array_map(function ($purchase){
            $purchase = Database::execute('get_purchase_by_id', 'OUT', array($purchase['id_purchase']))[0];
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