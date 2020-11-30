<?php


namespace Facade;


class Facade
{
    public static function __callStatic($name , $args){
        return $name()."Function Couldn't Find in the Root Class";
    }
}