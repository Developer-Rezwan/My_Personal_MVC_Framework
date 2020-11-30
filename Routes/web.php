<?php

use App\core\Application;
use Facade\Route;

use \app\Controllers\homeController;
use \app\Controllers\LoginController;
use \app\Controllers\RegisterController;


Route::get('/',[homeController::class,"home"]);
Route::get('/profile',function (){
    return Application::$app->route->renderView("profile");
});

Route::get('/login',[LoginController::class , "login"]);
Route::post('/login',[LoginController::class , "loginControl"]);

Route::get('/register',[RegisterController::class , "register"]);
Route::post('/register',[RegisterController::class , "registerControl"]);
