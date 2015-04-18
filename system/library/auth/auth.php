<?php
class Auth {
    
    private static $loginUrl;
    private static $user_id;
    private static $user_name;
    private static $user_email;
    
    public static function initialize($loginUrl = '/login') {
        session_start();
        Auth::$loginUrl = $loginUrl;
        
        Auth::$user_id = (isset($_SESSION['logged_id']) && $_SESSION['logged_id'])?$_SESSION['logged_id']:0;
        Auth::$user_name = (isset($_SESSION['logged_name']) && $_SESSION['logged_name'])?$_SESSION['logged_name']:'';
    }
    
    public static function isLogin() {
        if (Auth::getUserId() > 0)
            return TRUE;
    }
    
    public static function hasRole($role) {
        return TRUE;
    }
    
    public static function getLoginUrl() {
        return Auth::$loginUrl;
    }
    
    public static function login($id, $username) {
        Auth::$user_id = $id;
        Auth::$user_name = $username;
        
        $_SESSION['logged_id'] = $id;
        $_SESSION['logged_user'] = $username;
        
        return TRUE;
    }
    
    public static function logout() {
        session_destroy();
    }
    
    public static function redirectToLogin() {
        UrlHelper::redirect(Auth::getLoginUrl());
    }
    
    public static function getUserId() {
        return Auth::$user_id;
    }
    
}

Auth::initialize();