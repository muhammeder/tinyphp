<?php
class Request {
    
    private $list = array();
    
    public function __construct() {
        if ($this->isMethodGet()) {
            $this->list = $_GET;
        } else if ($this->isMethodPost()) {
            $this->list = $_POST;
        }
    }
    
    public function hasPrm($prm) {
        if(isset($this->list[$prm]) && !empty($this->list[$prm])) {
            return TRUE;
        }
    }
    
    public function getPrm($prm) {
        if ($this->hasPrm($prm))
            return htmlspecialchars($this->list[$prm]);
        else
            return '';
    }
    
    public function isMethodGet() {
        return $this->getMethod() === 'GET';
    }
    
    public function isMethodPost() {
        return $this->getMethod() === 'POST';
    }
    
    public function getMethod() {
        return $_SERVER['REQUEST_METHOD'];
    }
    
}