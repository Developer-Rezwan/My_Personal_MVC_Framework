<?php

$app->route->get('/',[ContactController::class,"home"]);
$app->route->get('/contact',"contact");

$app->route->post('/contact',[ContactController::class,"contact"]);