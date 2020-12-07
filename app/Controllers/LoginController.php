<?php


namespace App\Controllers;



use App\Vendor\Framework\Form\Request;

class LoginController extends Controller
{
    public function login(){
        return $this->view('login');
    }

    public function loginControl(Request $r){
         $r->validate([
             'username'   =>   "required|min:6|max:20",
             'password'   =>   "required|max:20|min:8"
         ]);

         if($r->all()){
             print_r($r->all());
         }else{
             return $this->view("login");
         }
    }
}