<?php

class Route {
    
    private $controller = array();
    private $action = array();
    
    private $before;
    private $after;
    
    public function __construct() {
    }
    
    public function get($controller, $action=null) {
        return $this->addAction('GET', $controller, $action);
    }
    
    public function post($controller, $action=null) {
        return $this->addAction('POST', $controller, $action);
    }
    
    private function addAction($method, $controller, $action=null) {
        if ($action == null) $action = 'indexAction';
        $this->controller[$method] = $controller;
        $this->action[$method] = $action;
        
        return $this;
    }
    
    public function getAction() {
        if (is_callable($this->before))
            call_user_func($this->before);
            
        $method = $_SERVER['REQUEST_METHOD'];
        
        $controller = $this->controller[$method];
        if(is_callable($controller)) {
            $controller();
        } else {
            includeFile("/app/controllers/$controller.php");
            $obj = new $controller;
            $action = $this->action[$method];
            
            $obj->$action();
        }
        
        if (is_callable($this->after))
            call_user_func($this->after);
    }
    
    public function addBefore($before) {
        $this->before = $before;
        return $this;
    }
    
    public function addAfter($after) {
        $this->after = $after;
        return $this;
    }
    
}