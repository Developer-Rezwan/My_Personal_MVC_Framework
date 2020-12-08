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
    public Database $db;

    public function __construct($root_dir)
    {
        self::$app = $this;
        self::$Root_Dir = $root_dir;
        $this->request = new Request();
        $this->response = new Response();
        $this->route = new Router($this->request);
        $this->blade = new Blade();
        $this->db = new Database();
    }

    public function run()
    {
      /*
       * It will throw the code of index which contain route->get/post data to the resolve methor of Router::route;
       */
      echo $this->route->resolve();
    }
}