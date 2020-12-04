<?php


namespace App\Controllers;


use App\Requests\LoginRequests;

class LoginController extends Controller
{
    public function login(){
        return $this->view('login');
    }

    public function loginControl(LoginRequests $r){
         print_r($r->all());
    }
}