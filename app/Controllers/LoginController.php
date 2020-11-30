<?php


namespace app\Controllers;


class LoginController extends Controller
{
    public function login(){
        return $this->view('login');
    }

    public function loginControl(){
        print_r($_POST);
    }
}