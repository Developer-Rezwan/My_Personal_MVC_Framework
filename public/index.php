<?php
require_once __DIR__."/../vendor/autoload.php";

use App\Controllers\homeController;
use App\core\Application;
use App\Controllers\ContactController;

$app = new Application(dirname(__DIR__));

$app->route->get('/',[homeController::class,"home"]);
$app->route->get('/contact','contact');

$app->route->post('/contact',[ContactController::class,"contact"]);

$app->run();