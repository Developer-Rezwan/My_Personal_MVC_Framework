<?php

namespace App\core;

class Router
{
    // Implement here the Request class
    public Request $request;

    // go here the routers like get  , post , delete , update etc.
    protected array $routers = [];

    public function __construct(Request $request)
    {
        // Request is class name and $request is variable which contain the instance of Request class
       $this->request = $request;
    }

    public function get($path , $callback)
    {
        //recieve data from index.php which can a path and callback function or filename of view without .php
        $this->routers['get'][$path] = $callback;

    }

    public function post($path , $callback)
    {
        //recieve data from index.php which can a path and callback function or filename of view without .php
        $this->routers['post'][$path] = $callback;

    }

    // this is function is route destribution
    public function resolve()
    {
        // This recieve the method name from the url
        $method = $this->request->method();
        // This recieve the path name from the url
        $path = $this->request->getPath();
        // This will do the spefication of path and function or string from the index.php or given route name
        $callback = $this->routers[$method][$path] ?? false;
        if($callback === false)
        {
            //The system is the another system instead of $this->response;
            Application::$app->response->httpStatusCode(404);
          return "<div style='text-align:center;margin-top:50px;font-size:30px;color:tomato'><span style='font-size: 200px;color: red;'>404</span> PAGE NOT FOUND! <br/><h1>Go Back To The <a href='/'>Home</a> Page</h1> </div>";
        }
        if(is_string($callback)){
            // specific the type of $callback is views filename,it will execute from here
            return $this->renderView($callback);
        }
        if(is_array($callback)){
            $callback[0]= new $callback[0]();
        }

        return call_user_func($callback , $this->request);

    }

        public function renderView($view , $data = [])
    {
        //it will execute the pag
        $renderview = $this->renderOnlyView($view,$data);
        $pattern = "/@extends\(\"\w+\/\w+\/?(\w+)?\"\)/i";

        if(preg_match($pattern, $renderview) == 1){

            $position = strpos($renderview,")");
            $i = $position - 11;
            $newlayouts = substr($renderview,10,$i);

            $layouts = $this->layoutsView($newlayouts);
            $renderview = preg_replace($pattern,"",$renderview);
            return str_replace("@yield" , $renderview , $layouts);
        }else{
           echo $renderview;
        }

    }

    protected function layoutsView($layouts)
    {
        ob_start();
        require_once Application::$Root_Dir."/Views/$layouts.php";
        return ob_get_clean();
    }

    protected function renderOnlyView($view , $data)
    {

        foreach ($data as $key => $value) {
            $$key = $value;
        }
        ob_start();
        require_once Application::$Root_Dir."/Views/$view.php";
        return ob_get_clean();
    }

}