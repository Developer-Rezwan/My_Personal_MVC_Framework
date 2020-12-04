<?php


namespace App\Controllers;


use App\Requests\Requests;

class RegisterController extends Controller
{
    public function register(){
        return $this->view('register');
    }

    public function registerControl(Requests $request){
        //print_r($request->only('email'));
        $data = $request->only("email" , 'password' , 'username');
        if($data){
            return print_r($data);
        }else{
            return $this->view('register');
        }
    }
}