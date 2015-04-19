<?php
class Form {
    
    public static function post($action = '', $method = 'POST') {
        $actionRoute = UrlHelper::getPath($action);
        return "<form action='$actionRoute' method='$method'>";
    }
    
    public static function end() {
        return '</form>';
    }
    
    public static function input($data = array()) {
        $str = "<input ";
        foreach ($data as $key => $value) {
            $str .= "$key=\"$value\" ";
        }
        $str .= "/>";
        return $str;
    }
}