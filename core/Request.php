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

   public function method()
   {
       // $_SERVER['REQUEST_METHOD'] will specified the method like get/post
       return strtolower($_SERVER['REQUEST_METHOD']);
   }
   // this function is specially for the data security and remove the unwanted chars or sytax from route
   public function requested_data()
   {
       $data = [];
     if($this->method() === "get")
     {
           foreach($_GET as $key => $value){
               $data[$key] = filter_input(INPUT_GET , $key , FILTER_SANITIZE_SPECIAL_CHARS);
           }
       }
     if($this->method() === "post")
     {
           foreach($_POST as $key => $value){
               $data[$key] = filter_input(INPUT_POST , $key , FILTER_SANITIZE_SPECIAL_CHARS);
           }
       }
     return $data;
   }
}