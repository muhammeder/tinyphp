<?php
includeFile('/system/library.php');
includeFile('/system/routing.php');
includeFile('/system/route.php');
includeFile('/system/controller.php');

class App {
    
    public $route;
    
    public $library;
    
    public function __construct($mode = 'release') {
        if ($mode == 'debug') {
            ini_set('display_errors', 'On');
            error_reporting(E_ALL);
        }
        $this->library = new Library();
        $this->routing = new Routing();
    }
    
    public function run() {
        $this->routing->submit();
    }
    
}
