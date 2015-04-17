<?php

class Route {
    
    private $controller;
    private $action;
    
    private $before;
    private $after;
    
    public function __construct($controller, $action=null) {
        if ($action == null) $action = 'indexAction';
        $this->controller = $controller;
        $this->action = $action;
    }
    
    public function getAction() {
        if (is_callable($this->before))
            call_user_func($this->before);
        
        if(is_callable($this->controller)) {
            $func = $this->controller;
            $func();
        } else {
            includeFile('/app/controllers/' . $this->controller . '.php');
            $class = $this->controller;
            $obj = new $class;
            $action = $this->action;
            
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