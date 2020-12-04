<?php

namespace App\Requests;

use App\Vendor\Framework\Form\Validations;

class LoginRequests extends Validations
{

    public function rules(){
        return [
            'username' => "required|min:6|max:8",
            'password' => "required|max:8|min:4",
        ];
    }

    public function thisClass(){
        return $this;
    }

}