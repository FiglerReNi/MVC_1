<?php

include(__DIR__ . "\config\config.php");
include "vendor\autoload.php";

$path = "";
if (php_sapi_name() == 'cli') {
    $path = $argv[1];
} else {
    $path = substr(str_replace('/', DIRECTORY_SEPARATOR, $_SERVER['PATH_INFO']), 1);
}
if (class_exists($path)) {
    new $path(); //ide kellene result, hogy lefutot-e, pl. valami log
} else {
    file_put_contents('c:\USERS\figlerr\Documents\RENI-LOGJA.log',$exception.PHP_EOL,FILE_APPEND);
    header("Location: controller\ErrorController"); // itt lehet valami szép oldal (twiggel majd pl) +log
}




