<?php

$authAdmin = function() {
    echo 'You are admin <br />';
};

global $app;

$app->routing->add("/", "HomeController", "indexAction")->addBefore($authAdmin)->addAfter(function() {
    echo 'AFTER <br />';
});
$app->routing->add("/login", "LoginController", 'login');
$app->routing->add("/logout", function() {
    echo 'Logout function';
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