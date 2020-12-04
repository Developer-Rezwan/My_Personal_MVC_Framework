<?php


namespace App\Controllers;


class profileController extends Controller
{
  public function index(){
      return $this->view('profile');
  }
}