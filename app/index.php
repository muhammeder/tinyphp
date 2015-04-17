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