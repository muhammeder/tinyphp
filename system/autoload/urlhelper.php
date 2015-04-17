<?php
class UrlHelper {
    public static function redirect($route) {
        $routePath = UrlHelper::getPath($route);
        header("Location: $routePath");
        die();
    }
    
    public static function getAppPath() {
        $uriPath = '/';
        if (array_key_exists('SCRIPT_NAME', $_SERVER)) {
            $uriPath = dirname($_SERVER['SCRIPT_NAME']);
        }
        return $uriPath;
    }
    
    public static function getUri() {
        $uriPath = '/';
        if (array_key_exists('PATH_INFO', $_SERVER)) {
            $uriPath = $_SERVER['PATH_INFO'];
        }
        return $uriPath;
    }
    
    public static function getPath($route) {
        return UrlHelper::getAppPath() . $route;
    }
}