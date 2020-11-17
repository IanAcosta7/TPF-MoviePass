<?php
    namespace DAO;

    use business\models\CreditAccount;

    use DAO\Database;

    require_once("./config/ENV.php");

    class CreditAccountDAO 
    {
        private $creditAccount = array();

        public function GetAll(){
            $this->creditAccount = $this->getDBcreditAccount();
            return $this->creditAccount;
        }
    
        private function getDBcreditAccount(){
            Database::connect();
            $DBcreditAccount = Database::execute('', 'OUT');
            $DBcreditAccount = array_map(function ($creditAccount){
                $payment = Database::execute('', 'OUT', array($creditAccount['id']))[0];
                return new CreditAccount(
                    $creditAccount["id"],
                    $creditAccount["company"]
                );
            }, $DBcreditAccount);
    
            return $DBcreditAccount;
        }

    }