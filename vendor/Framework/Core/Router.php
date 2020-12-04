<?php

namespace App\Vendor\Framework\Core;

use App\Requests\Requests as Another;
use App\Vendor\Framework\Form\Validations;


class Router
{
    /*
     * Implement here the Requests class
     */
    public Request $request;

    /*
     * go here the routers like get  , post , delete , update etc.
     */
    protected array $routers = [];

    public function __construct(Request $request)
    {
        /*
         * Requests is class name and $request is variable which contain the instance of Requests class
         */
       $this->request = $request;
    }


    public function get($path , $callback)
    {
        /*
         * recieve data from index.php which can a path and callback function or filename of view without .php
         */
        $this->routers['get'][$path] = $callback;

    }

    public function post($path , $callback)
    {
        /*
         * recieve data from index.php which can a path and callback function or filename of view without .php
         */
        $this->routers['post'][$path] = $callback;

    }

    /*
     * this is function is route destribution
     */
    public function resolve()
    {
        /*
         * This recieve the method name from the url
         */
        $method = $this->request->method();

        /*
         *  This recieve the path name from the url
         */
        $path = $this->request->getPath();

        /*
         * This will do the spefication of path and function or string from the index.php or given route name
         */
        $callback = $this->routers[$method][$path] ?? false;
        if($callback === false)
        {
            /*
             * The system is the another system instead of $this->response;
             */
            Application::$app->response->httpStatusCode(404);
          return "<div style='text-align:center;margin-top:50px;font-size:30px;color:tomato'><span style='font-size: 200px;color: red;'>404</span> PAGE NOT FOUND! <br/><h1>Go Back To The <a href='/'>Home</a> Page</h1> </div>";
        }
        if(is_string($callback)){

            /*
             *  specific the type of $callback is views filename,it will execute from here
             */
            return $this->renderView($callback);
        }
        if(is_array($callback)){
            /*
             * if use $this in the function .. Then it will execute
             */
            $callback[0]= new $callback[0]();
        }
        $params = [new Another()];
        return call_user_func_array($callback , $params);

        }

        /*
         * View the layout or templacte From views/
         */
            public function renderView($view , $data = [])
        {

        $renderview = $this->renderOnlyView($view,$data);
        /*
         * Find the @extends(...) content
         */
        $layouts_pattern = "/@extends\(\"?\'?\w+\/\w+\/?(\w+)?\"?\'?\)/i";

        if(preg_match($layouts_pattern, $renderview) == 1){
            /*
             * find position of @extends from the page.. and minus @extends from the page
             */
            $start = strpos($renderview , "@extends(" )+10;
            /*
             * Find the ")" of @extends()
             */
            $end = strpos($renderview,")" , $start)-1;
            /*
             * Collect total string between @extends(" ...... ")
             */
            $i = $end - $start;
            /*
             * layouts directory like (layouts/app)
             */
            $newlayouts = substr($renderview,$start,$i);
            /*
             *  Pass the layouts path like (layouts/app.blade.php)
             */
            $layouts = $this->layoutsView($newlayouts);
            /*
             * this is the page without @extends(....)
             */
            $renderview = preg_replace($layouts_pattern,"",$renderview);
            /*
             * pass the Template part and layouts part in the blade file to process
             */
            $template = $this->templateView($renderview,$layouts);

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
            require_once Application::$Root_Dir."/Views/$layouts.blade.php";
            return ob_get_clean();
        }

        protected function renderOnlyView($view , $data)
        {
        $err = new Validations;
        if(!empty($err->error())){
            $error = $err->error();
        }else{
            $error = null;
        }

        foreach ($data as $key => $value) {
            $$key = $value;
        }
        ob_start();
        require_once Application::$Root_Dir."/Views/$view.blade.php";
        return ob_get_clean();
        }

        private function templateView($template,$layouts)
        {
            Application::$app->blad->bladeTemplate($template , $layouts);
            Application::$app->blad->bladeLayouts($layouts);
            return Application::$app->blad->bladeResolve();
        }


}