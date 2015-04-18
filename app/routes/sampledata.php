<?php
global $app;

$app->routing->add("/import")
    ->get(function () use ($app) {
        echo 'Red Bean Php <br />';
        $app->library->import('rb');
        R::setup( 'sqlite:/tmp/dbfile.db' );
        
        $user = R::dispense( 'user' );
        $user->username = 'muhammed';
        $user->password = '123';
        $user->roles = 'ROLE_ADMIN,ROLE_USER';
        $id = R::store( $user );
        
        echo "ID: $id , Username: $user->username, Roles: $user->roles <br />";
        
        $user2 = R::dispense( 'user' );
        $user2->username = 'emin';
        $user2->password = '123';
        $user2->roles = 'ROLE_USER';
        $id2 = R::store( $user2 );
        
        echo "ID: $id2 , Username: $user2->username, Roles: $user2->roles <br />";
        
        R::close();
    });

$app->routing->add("/destroy")
    ->get(function () use ($app) {
        $app->library->import('rb');
        R::setup( 'sqlite:/tmp/dbfile.db' );
        R::nuke();
        R::close();
        
        echo 'Red Bean Php is destoryed. <br />';
    });
