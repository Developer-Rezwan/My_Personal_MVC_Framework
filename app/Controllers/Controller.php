<?php
namespace App\Controllers;
use App\Vendor\Framework\Core\Application;

/*
 * Controller must need to exdends in the new class
 */
class Controller
{
    /*
     * "$data" is optional part for passing data .
     * Anyone can change it
     */
     public $data = [];
     protected function view($view , $data = [])
     {
         /*
          * This code will be return the view
          */
         return Application::$app->route->renderView($view , $data);
     }
}