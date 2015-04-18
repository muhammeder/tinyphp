<?php
includeFolder('/system/autoload');

class App {
    
    public $route;
    public $library;
    public $library_user;
    public $request;
    
    public function __construct($mode = 'release') {
        if ($mode == 'debug') {
            ini_set('display_errors', 'On');
            error_reporting(E_ALL);
        }
        
        $this->library = new Library('/system/library');
        $this->library_user = new Library('/app/library');
        $this->routing = new Routing;
        $this->request = new Request;
    }
    
    public function run() {
        $this->routing->submit();
    }
    
}
