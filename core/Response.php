<?php
namespace App\core;
class Response
{
    public function httpStatusCode(int $code)
    {
        // Set Status code for page not found wich is 404 .
        return http_response_code($code);
    }
}
