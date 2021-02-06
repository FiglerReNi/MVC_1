<?php

use core\log\Log;

include("config\config.php");
include "vendor\autoload.php";

$path = "";
if (php_sapi_name() == 'cli') $path = $argv[1];
else $path = substr(str_replace('/', DIRECTORY_SEPARATOR, $_SERVER['PATH_INFO']), 1);
if (class_exists($path)) new $path(); //ide kellene result, hogy lefutot-e, pl. valami log
else {
    $fileName = '/system.log';
    $message = date("Y-m-d H:i:s") . PHP_EOL . 'A keresett útvonal nem található: ' . $path;
    new Log($fileName, $message);
    header("Location: controller\PageNotFoundController"); // itt lehet valami szép oldal (twiggel majd pl) +log
}




