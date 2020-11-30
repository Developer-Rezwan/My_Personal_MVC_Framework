<?php


namespace app\Controllers;


class RegisterController extends Controller
{
    public function register(){
        return $this->view('register');
    }

    public function registerControl(){
        print_r($_POST);
        //return Application::$app->request->validation();
    }
}