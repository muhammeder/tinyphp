<?php
class Auth {
    
    private $loginUrl;
    
    public function __construct($loginUrl = '/login') {
        session_start();
        $this->loginUrl = $loginUrl;
    }
    
    public function isLogin() {
        if ($this->getLoggedUserId() > 0)
            return TRUE;
    }
    
    public function hasRole($role) {
        return TRUE;
    }
    
    public function getLoggedUserId() {
        if (isset($_SESSION['logged_user']) && $_SESSION['logged_user'] > 0) {
            return $_SESSION['logged_user'];
        }
        return 0;
    }
    
    public function getLoginUrl() {
        return $this->loginUrl;
    }
    
}