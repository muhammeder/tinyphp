<?php
global $app;

$app->routing->add("/")
    ->get("DashboardController", "indexAction")
    ->post("DashboardController", "newUser")
    ->addBefore(function () use ($app) {
        $app->library->import('auth')->import('form')->import('html');
        $app->library_user->import('db');
        Auth::hasNotRoleRedirect('ROLE_USER');
    });
    
$app->routing->add("/delete")
    ->get(function () use($app) {
        $id = $app->request->getPrm('id');
        UserModel::delete($id);
        UrlHelper::redirect("/");
    })->addBefore(function () use ($app) {
        $app->library_user->import('db');
        $app->library->import('auth');
        Auth::hasNotRoleRedirect('ROLE_ADMIN');
    });
