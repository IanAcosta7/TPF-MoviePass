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
            $DBcreditAccount = Database::execute('get_credit_accounts', 'OUT');
            $DBcreditAccount = array_map(function ($creditAccount){
                return new CreditAccount(
                    $creditAccount["id_credit_account"],
                    $creditAccount["company"]
                );
            }, $DBcreditAccount);
    
            return $DBcreditAccount;
        }

    }