<?php
class Form {
    
    public static function post($action = '', $type = 'POST') {
        $actionRoute = UrlHelper::getPath($action);
        return "<form action='$actionRoute' type='$type'>";
    }
    
    public static function end() {
        return '</form>';
    }
}