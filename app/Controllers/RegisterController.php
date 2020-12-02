<?php


namespace app\Controllers;


use app\Requests\Request;

class RegisterController extends Controller
{
    public function register(){
        return $this->view('register');
    }

    public function registerControl(Request $request){
        return $this->view('register');
    }
}