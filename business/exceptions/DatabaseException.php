<?php namespace business\exceptions;

class DatabaseException extends \Exception{
    private $errorType;
    private $errorNumber=500;
    public function __construct($mesagge, $errorType)
    {
        parent::__construct($mesagge);
        $this->errorType=$errorType;
    }

    public function getErrorType()
    {
        return $errorType;
    }

    public function getErrorNumber()
    {
        return $errorNumber;
    }

}
?>