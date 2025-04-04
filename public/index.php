<?php
session_start();

require '../app/core/init.php';


$myApp = new App;
$myApp->loadController();