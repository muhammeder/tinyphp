<?php

function includeFile($fileName) {
    include (dirname($_SERVER["SCRIPT_FILENAME"]) . $fileName);
}

includeFile("/system/app.php");

$app = new App('debug');

includeFile("/app/index.php");

$app->run();