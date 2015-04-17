<?php
class LoginController extends Controller {
    
    public function indexAction() {
        echo 'this is indexAction of LoginController';
        echo 'test';
    }
    
    public function login() {
        //echo 'this is login of LoginController';
        $this->render('login/login');
    }
    
    public function logout() {
        echo 'this is logout of LoginController';
    }
    
}