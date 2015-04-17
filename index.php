<?php
    function includeFile($fileName) {
        include (dirname($_SERVER["SCRIPT_FILENAME"]) . $fileName);
    }
    
    includeFile("/system/app.php");
    
    $app = new App('debug');
    
    $authAdmin = function() {
        echo 'You are admin <br />';
    };
    
    $app->routing->add("/", "HomeController", "indexAction")->addBefore($authAdmin)->addAfter(function() {
        echo 'AFTER <br />';
    });
    $app->routing->add("/login", "LoginController", 'login');
    $app->routing->add("/logout", function() {
        echo 'Logout function';
    });
    
    $app->run();