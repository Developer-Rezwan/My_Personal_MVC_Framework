<?php
namespace App\Controllers;

use App\core\Application;
use App\core\Request;

class ContactController extends Controller
{
    public function contact(Request $request)
    {
        print_r($request->requested_data());
        return $this->view("contact");
    }

}