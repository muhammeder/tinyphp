<?php
global $app;

function hasRole($role) {
    global $app;
    $app->library->import('auth');
    
    if (!Auth::isLogin() || !Auth::hasRole($role)) {
        UrlHelper::redirect(Auth::getLoginUrl());
    }
};

$app->routing->add("/login")
    ->get("LoginController", "loginAction")
    ->post(function () {
        global $app;
        $app->library->import('auth');
        $auth = new Auth;
        if ($auth->login(5, 'Muhammed')) {
            UrlHelper::redirect("/");
        }
        UrlHelper::redirect("/login");
    })
    ->addBefore(function() use ($app) {
        $app->library->import('form');
    });
    
$app->routing->add("/logout")
    ->get(function () {
        global $app;
        $app->library->import('auth');
        Auth::logout();
        UrlHelper::redirect("/login");
    });

$app->routing->add("/")
    ->get(function () {
        global $app;
        $app->library->import('auth');
        echo 'Your user id : ' . Auth::getUserId();
    })->addBefore(function () {
        hasRole('ROLE_ADMIN');
    });
    
    
    
    

/*
$app->routing->add("/login", "LoginController", 'login')->addBefore(function() use ($app) {
    $app->library->import('form');
});
$app->routing->add("/logout", function() {
    UrlHelper::redirect("/login");
});
$app->routing->add("/dashboard", function() {
    echo 'This is dashboard';
})->addBefore(function() {
    hasRole('user');
});

$app->routing->add("/rb", function() use ($app) {
    echo 'Red Bean Php <br />';
    $app->library->import('rb');
    R::setup( 'sqlite:/tmp/dbfile.db' );
    
    $book = R::dispense( 'book' );
    $book->title = 'Learn to Program';
    $book->rating = 10;
    $id = R::store( $book );
    
    echo 'ID: ' . $id;
    
    R::close();
});
*/