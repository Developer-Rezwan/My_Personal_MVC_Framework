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
            $callback[0]= new $callback[0](); //if use $this in the function .. Then it will execute
        }

        return call_user_func($callback , new \app\Requests\Request() ,$this->request);

    }

        public function renderView($view , $data = [])
    {

        $renderview = $this->renderOnlyView($view,$data);

        $layouts_pattern = "/@extends\(\"?\'?\w+\/\w+\/?(\w+)?\"?\'?\)/i"; // Find the @extends(...) content

        if(preg_match($layouts_pattern, $renderview) == 1){

            $start = strpos($renderview , "@extends(" )+10; //find position of @extends from the page.. and minus @extends from the page
            $end = strpos($renderview,")" , $start)-1; // find the
            $i = $end - $start;
            $newlayouts = substr($renderview,$start,$i); //layouts directory like (layouts/app)

            $layouts = $this->layoutsView($newlayouts); // Pass the layouts path like (layouts/app.php)
            $renderview = preg_replace($layouts_pattern,"",$renderview); //this is the page without @extends(....)

            $template = $this->templateView($renderview,$layouts); // pass the layouts and pass information for mastaring

            $keys = [];
            $values = [];
            foreach ($template as $value){
                foreach ($value as $key => $value){
                  array_push($keys , $key);
                  array_push($values,$value);
                }
            }
           $viewer =  str_replace($keys, $values ,$layouts);
            if(preg_match("/@yield\(\"?\'?\w+\-?\w+?\_?(\w+)?\"?\'?\)/i", $viewer) == 1){
                return preg_replace("/@yield\(\"?\'?\w+\-?\w+?\_?(\w+)?\"?\'?\)/i","",$viewer);
            }else{
              return  $viewer ;
            }

        }else{
           return $renderview;
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

    private function templateView($template,$layouts)
    {
        Application::$app->blad->bladeTemplate($template , $layouts);
        Application::$app->blad->bladeLayouts($layouts);
        return Application::$app->blad->bladeResolve();
    }


}