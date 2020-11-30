<?php

namespace app\Requests;

class Request
{

    public function rules(){
        return [
          'email' => 'required',
          'username' => 'required',
          'password' => 'required',
        ];
    }

}