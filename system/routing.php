<?php

class Routing {
    
    private $_uri = array();
    
    public function add($uri, $controller, $method=null) {
        $route = new Route($controller, $method);
        $this->_uri[$uri] = $route;
        return $route;
    }
    
    public function submit() {
        $uriPath = '/';
        if (array_key_exists('PATH_INFO', $_SERVER)) {
            $uriPath = $_SERVER['PATH_INFO'];
        }
        
        $b = FALSE;
        foreach ($this->_uri as $key => $value) {
            //if (preg_match("#^$key$#", $uriPath)) {
            if ($uriPath === $key) {
                $value->getAction();
                $b = TRUE;
                break;
            }
        }
        
        if (!$b) {
            echo "Page is not found!";
            exit();
        }
    }
}
