<?php namespace business\exceptions;

class WebsiteException extends \Exception{
    private $errorType;
    private $errorNumber;
    public function __construct($mesagge, $errorType, $errorNumber = 500)
    {
        parent::__construct($mesagge);
        $this->errorType=$errorType;
        $this->errorNumber = $errorNumber;
    }

    public function getErrorType()
    {
        return $this->errorType;
    }

    public function getErrorNumber()
    {
        return $this->errorNumber;
    }

}
?>