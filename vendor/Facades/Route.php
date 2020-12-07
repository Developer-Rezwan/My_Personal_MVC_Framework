<?php


namespace App\Vendor\Facades;

use App\Vendor\Framework\Core\Application;

class Route extends Facade
{
  public static function get($path , $callback){
      Application::$app->route->get($path,$callback);
  }
  public static function post($path , $callback){
      Application::$app->route->post($path,$callback);
  }
}