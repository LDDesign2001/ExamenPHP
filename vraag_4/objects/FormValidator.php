<?php

class FormValidator {
    
    private $form = "";
    
    public function getForm() {
        return $this->form;
    }
    
    public function setForm($form) {
        $this->form = $form;
    }
    
    public function isValid() {  
        return $this->form->getKnock() == 2 && $this->form->getRub() == 7 && $this->form->getMessage() == "Sesam, open je";
    }
}