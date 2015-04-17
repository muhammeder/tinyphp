<?php
$autoload_files = array_diff(scandir('system/autoload'), array('..', '.'));
foreach ($autoload_files as $value) {
    $file = '/system/autoload/' . $value;
    if (!is_dir($file))
        includeFile($file);
}

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
        $this->urlHelper = new UrlHelper();
    }
    
    public function run() {
        $this->routing->submit();
    }
    
}
