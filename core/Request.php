<?php
namespace App\core;

class Request
{
    public function getPath()
   {
       // Recieve the path by the $_SERVER['REQUEST_URI] like users?id=1
       $path = $_SERVER['REQUEST_URI'] ?? "/";

       //Specified the "?" have or not in the url , it will return the position of "?".
       $position = stripos($path,"?");
       //if "?" will not exist
       if($position === false){
          // it will pass the fresh url like "users/"
           return $path;
       }else{
           // it will pass the fresh url like "users/"
           return $path = substr($path,0,$position);
       }
   }

   public function getMethod()
   {
       // $_SERVER['REQUEST_METHOD'] will specified the method like get/post
       return strtolower($_SERVER['REQUEST_METHOD']);
   }

}