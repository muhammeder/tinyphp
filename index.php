<?php

define('BASE_PATH', dirname($_SERVER["SCRIPT_FILENAME"]));

function endswith($string, $test) {
    $strlen = strlen($string);
    $testlen = strlen($test);
    if ($testlen > $strlen) return false;
    return substr_compare($string, $test, $strlen - $testlen, $testlen) === 0;
}

spl_autoload_register(function ($class) {
    //include 'classes/' . $class . '.class.php';
    if (endswith($class, 'Model')) {
        $filename = strtolower($class) . '.php';
        includeFile("/app/models/$filename");
    }
});

function includeFile($fileName) {
    include_once (BASE_PATH . $fileName);
}

function includeFileWithData($fileName, $data = array()) {
    ob_start();
    extract($data);
    include (BASE_PATH . $fileName);
    return ob_get_clean();
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