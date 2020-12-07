<?php
namespace App\Controllers;

use App\Vendor\Framework\Core\Application;

class Controller
{
    /*
     * "$data" is optional part for passing data .
     * Anyone can change it
     */

    protected array $data = [];

    public function view($view , $data = []) : string
     {
         return Application::$app->route->renderView($view , $data);
     }

}