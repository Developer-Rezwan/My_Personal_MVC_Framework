<?php


namespace App\Controllers;



use App\Vendor\Framework\Form\Request;

class LoginController extends Controller
{
    public function login(){
        return $this->view('login');
    }

    public function loginControl(Request $r){
        print_r($_ENV);
    }
}