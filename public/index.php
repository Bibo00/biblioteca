<?php


/*function show($s)
{
    echo '<pre>';
    print_r($s);
    echo '</pre>';
}*/

session_start();

require '../app/core/init.php';


$myApp = new App;
$myApp->loadController();