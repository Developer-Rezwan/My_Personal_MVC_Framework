<?php
require_once __DIR__."/../vendor/autoload.php";
use App\core\Application;

$app = new Application(dirname(__DIR__));

$app->route->get('/',"welcome");
$app->route->get('/contact',"contact");

$app->route->post('/contact',function (){
    return print_r($_POST);
});

$app->run();