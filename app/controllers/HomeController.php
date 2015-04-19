<?php
class HomeController extends Controller {
    
    public function indexAction() {
        //echo 'this is indexAction of HomeController<br />';
        $this->render('home/deneme');
    }
}