<?php

namespace Core;

class Request{

    private array $routeParams = [];

     public function setRouteParams($params){
        $this->routeParams = $params;
     }

     public function getRouteParams(){
        return $this->routeParams;
     }
     
    public function getPath(){
        $path = $_SERVER["REQUEST_URI"] ?? "/";
        $position = strpos($path, "?");
        
        if(!$position){
            return $path;
        }
       
       return substr($path, 0 , $position);
    }

    public function getMethod(){
        return strtolower($_SERVER["REQUEST_METHOD"]);
    }

    public function getBody(){
        $body = [];
        if($this->getMethod() === "get"){
            foreach($_GET as $key => $value){
                $body[$key] = filter_input(INPUT_GET, $key, FILTER_SANITIZE_SPECIAL_CHARS);
            }
        }
        if($this->getMethod() === "post"){
            foreach($_POST as $key => $value){
                
                $body[$key] = filter_input(INPUT_POST, $key, FILTER_SANITIZE_SPECIAL_CHARS);
            }
        }
        return $body;
    }
}