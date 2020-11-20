<?php
require_once __DIR__."/../vendor/autoload.php";

use App\core\Application;
use App\Controllers\ContactController;

$app = new Application(dirname(__DIR__));

$app->route->get('/',[ContactController::class,"home"]);
$app->route->get('/contact',[ContactController::class,"contact"]);

//$app->route->post('/contact',[ContactController::class,"contact"]);

$app->run();