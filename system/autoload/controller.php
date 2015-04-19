<?php
global $app;
class Controller {
    protected $app;
    
    public function __construct() {
        global $app;
        $this->app = $app;
    }
    
    public function render($themeFile, $data = array()) {
        echo includeFileWithData('/app/views/' . $themeFile . '.php', $data);
    }
    
}