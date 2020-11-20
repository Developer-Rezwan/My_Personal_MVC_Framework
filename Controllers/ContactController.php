<?php
namespace App\Controllers;

use App\core\Application;

class ContactController extends Controller
{
    public function contact()
    {
        return $this->view("contact");
    }

    public function home(){
        $this->data=[
            "Fullname" => ["name" => "Rezwan","lname" => "Hossain"],
            "Subject" => ["Laravel" , "php"]
            ];
        return $this->view("welcome",$this->data);
    }

}