<?php
global $app;

$app->routing->add("/login")
    ->get("LoginController", "loginAction")
    ->post("LoginController", "loginPostAction")
    /*
    ->post(function () use ($app) {
        $username = $app->request->getPrm('username');
        $password = $app->request->getPrm('password');
        
        $user = UserModel::find($username, $password);
        if (!$user)
            UrlHelper::redirect("/login");
        if (Auth::login($user->id, $user->username, $user->roles)) {
            UrlHelper::redirect("/");
        }
    })
    */
    ->addBefore(function() use ($app) {
        $app->library
            ->import('auth')
            ->import('form')
            ->import('rb');
        $app->library_user->import('db');
    });
    
$app->routing->add("/logout")
    ->get(function () {
        Auth::logout();
        UrlHelper::redirect("/login");
    })->addBefore(function () use ($app) {
        $app->library->import('auth');
    });
    
$app->routing->add('/deneme')
    ->get('HomeController', 'indexAction');
