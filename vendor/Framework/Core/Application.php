<?php

namespace App\Vendor\Framework\Core;


class Application
{
    public static string $Root_Dir;
    public Request $request;
    public Router $route;
    public Response $response;
    public static Application $app;
    public Blade $blade;

    public function __construct($root_dir)
    {
        /*
         *  This is the easiest system of passing a class with application class which is easy.
         */
        self::$app = $this;
        self::$Root_Dir = $root_dir;
        $this->request = new Request();
        $this->response = new Response();
        /*
         * This is a system of variable passing with a class
         */
        $this->route = new Router($this->request);
        $this->blade = new Blade();
    }

    public function run()
    {
      /*
       * It will throw the code of index which contain route->get/post data to the resolve methor of Router::route;
       */
      echo $this->route->resolve();
    }
}