<?php

use App\Vendor\Facades\Route;

use \App\Controllers\{profileController , homeController , LoginController , RegisterController};

/*
 * You must need to add the Facade otherwise it will throw a error
 * If you call any controller, you must need to add use that controller and then it will work perfectly
 * You can import multiple class in {} for the same namespace
 * You also can import as general thing like \App\Controllers\LoginController
 */

Route::get('/',[homeController::class,"home"]);
Route::get('/profile',[profileController::class,"index"]);

Route::get('/login',[LoginController::class , "login"]);
Route::post('/login',[LoginController::class , "loginControl"]);

Route::get('/register',[RegisterController::class , "register"]);
Route::post('/register',[RegisterController::class , "registerControl"]);
