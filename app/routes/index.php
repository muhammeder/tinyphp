<?php
global $app;

function hasRole($role) {
    global $app;
    echo "Are you $role ? <br />";
    $app->library->import('auth');
    
    $auth = new Auth();
    
    if (!$auth->isLogin() || !$auth->hasRole($role)) {
        $app->urlHelper->redirect($auth->getLoginUrl());
    }
};

$app->routing->add("/", "HomeController", "indexAction")->addAfter(function() {
    echo 'AFTER <br />';
});
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