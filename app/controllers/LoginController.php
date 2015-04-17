<?php
class LoginController extends Controller {
    
    public function indexAction() {
        echo 'this is indexAction of LoginController';
        echo 'test';
    }
    
    public function loginAction() {
        //echo 'this is login of LoginController';
        $this->render('login/login');
    }
    
    public function logoutAction() {
        echo 'this is logout of LoginController';
    }
    
}