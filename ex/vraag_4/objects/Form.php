<?php

class Form {

    private $message = "";
    private $knock = "";
    private $rub = "";
    
    public function getMessage() {
        return $this->message;
    }
    
    public function setMessage($message) {
        $this->message = $message;
    }
    
    public function getKnock() {
        return $this->knock;
    }
    
    public function setKnock($knock) {
        $this->knock = $knock;
    }
    
    public function getRub() {
        return $this->rub;
    }
    
    public function setRub($rub) {
        $this->rub = $rub;
    }
}