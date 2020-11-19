<?php

namespace App\core;

class Application
{
    public static $Root_Dir;
    public Request $request;
    public Router $route;
    public Response $response;
    public static Application $app;

    public function __construct($root_dir)
    {
        // This is the esiest system of passing a class with application class which is easy.
        self::$app = $this;
        self::$Root_Dir = $root_dir;
        $this->request = new Request();
        $this->response = new Response();
        //This is a system of variable passing with a class
        $this->route = new Router($this->request);
    }

    public function run()
    {
        // It will throw the code of index which contain route->get/post data to the resolve methor of Router::route;
      echo $this->route->resolve();
    }
}