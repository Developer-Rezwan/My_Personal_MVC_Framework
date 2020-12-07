<?php


namespace App\Controllers;


use App\Vendor\Framework\Form\Request;

class RegisterController extends Controller
{
    public function register(){
        return $this->view('register');
    }

    public function registerControl(Request $request){
        $request->validate([
            'email' => "required|unique|max:32",
            'password' => "required|max:8|min:4|password",
            'confirmPassword' => "required|match:password",
            'phone' => "required|phone",
            'username' => "required|max:8|unique",
            'fname' => "required|max:8|unique",
            'mname' => "required|max:8|unique",
            'lname' => "required|max:8|unique",
            'zip' => "required|min:4:max:8"
        ]);

       if( $request->all()){
           print_r($request->all());
       }else{
          return $this->view("register");
       };

    }
}