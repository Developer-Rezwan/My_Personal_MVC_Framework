<?php


namespace app\Controllers;


class homeController extends Controller
{

    public function home(){
        $this->data=[
            "Fullname" => ["name" => "Rezwan","lname" => "Hossain"],
            "Subject" => ["Laravel" , "php"]
        ];
        return $this->view("welcome",$this->data);
    }

}