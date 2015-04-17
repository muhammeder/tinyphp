<?php
class Form {
    
    public static function post($action = '', $method = 'POST') {
        $actionRoute = UrlHelper::getPath($action);
        return "<form action='$actionRoute' method='$method'>";
    }
    
    public static function end() {
        return '</form>';
    }
}