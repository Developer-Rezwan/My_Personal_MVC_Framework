<?php

namespace App\Requests;

use App\Vendor\Framework\Form\validations;

class Requests extends validations
{

    public function rules(){
        return [
            'email' => "required|unique|max:32",
            'password' => "required|max:8|min:4|password",
            'confirmPassword' => "required|match:password",
            'phone' => "required|phone",
            'username' => "required|max:8|min:6|unique",
            'fname' => "required|max:8|unique",
            'mname' => "required|max:8|unique",
            'lname' => "required|max:8|unique",
            'zip' => "required|min:4:max:8"
        ];
    }

}