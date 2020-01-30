<?php

require '../vendor/autoload.php';


$url = $_SERVER['REQUEST_URI'];

$controller = [];
if ($url =='/joob7/web/'){
    $controller = ["App\Controllers\HomeControllers","index"];//action
}elseif($url =="/joob7/web/about" ) {
    $controller =  ["App\Controllers\HomeControllers","about"];
}

if (empty($controller)){
    echo '404 | ERROR';
} else {
    echo "1";
    call_user_func($controller);
}