<?php

define('BASE_PATH', dirname($_SERVER["SCRIPT_FILENAME"]));

function includeFile($fileName) {
    include (BASE_PATH . $fileName);
}

function includeFolder($folder) {
    $folder = BASE_PATH . $folder . "/*.php";
    foreach (glob($folder) as $filename) {
        include $filename;
    }
}

includeFile("/system/app.php");

$app = new App('debug');

includeFolder('/app/routes');

$app->run();