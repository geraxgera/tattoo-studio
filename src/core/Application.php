<?php

namespace Core;

class Application{
    public static string $ROOT_DIR;
    public static Application $app;
    public Router $router;
    public Request $request;
    public Response $response;
    public Controller $controller;
    public Database $db;
    public Session $session;
    
    public function __construct($rootPath, array $config)
    {
        self::$ROOT_DIR = $rootPath;
        self::$app = $this;
        $this->controller = new Controller;
        $this->request = new Request();
        $this->response = new Response();
        $this->router = new Router();
        $this->session = new Session();

        $this->db = new Database($config["db"]);
    }

    public function getController(){
        return $this->controller;
    }

    public function setController(Controller $controller){
        $this->controller = $controller;
    }

    public function run(){
        echo $this->router->resolve();
    }
}