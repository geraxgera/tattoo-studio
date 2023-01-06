<?php

namespace Core;

class Response {
    public function setStatusCode(int $statusCode){
        http_response_code($statusCode);
    }

    public function redirect($url)
    {
        header("Location: $url");
    }
}