<?php

namespace Core;

class Controller{
    public string $layout = "mainLayout";

    public function setLayout($layout){
        $this->layout = $layout;
    }

    public function render($view, $params = []){
        return Application::$app->router->renderView($view, $params);
    }
}