<?php
namespace App\Controllers;
use App\core\Application;

class Controller
{
    public $data = [];
     protected function view($view , $data = [])
     {
         return Application::$app->route->renderView($view , $data);
     }
}