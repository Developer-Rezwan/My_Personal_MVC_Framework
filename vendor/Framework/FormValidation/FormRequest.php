<?php


namespace App\Framework;


class FormRequest
{
    protected static $rules;
    public function request($form_data)
    {
        $name = [];
        foreach ($form_data as $key => $value) {
            array_push($name, $key);
        }
        print_r($name);
    }

    public static function FormValidationRules($data)
    {
       return self::$rules = $data;
    }
}