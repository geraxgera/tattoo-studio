<?php

require_once __DIR__ . "/../vendor/autoload.php";


use Core\Application;
use Controllers\HomeController;
use Controllers\AuthController;
use Controllers\DaschboardController;
use Controllers\aboutmeController;
use Controllers\leistungenpreiseController;
use Controllers\rezensionenController;
use Controllers\kontaktController;






$config = [
    "db" => [
        "dsn" => "mysql:host=db;",
        "dbName" => "my_first_mvc",
        "user" => "root",
        "password" => "php_mvc",
   
    ]
];

$root = dirname(__DIR__);

$app = new Application($root, $config);

$app->router->get("/", [HomeController::class, "homePage"]);
$user_session = (Application::$app->session->get("user"));

if(!$user_session){
    $app->router->get("/login", [AuthController::class, "loginPage"]);
    $app->router->post("/login", [AuthController::class, "loginFormHandler"]);

    $app->router->get("/register", [AuthController::class, "registerPage"]);
    $app->router->post("/register", [AuthController::class, "registerFormHandler"]);

}


 

if($user_session){

    $app->router->get("/rezensionen", [RezensionenController::class, "rezensionenPage"]);

    $app->router->post("/rezensionen", [RezensionenController::class, "handleRezensionen"]);
    

} 

$app->router->get("/daschboard", [DaschboardController::class, "daschboardPage"]);

$app->router->get("/about-me", [AboutmeController::class, "aboutmePage"]);

$app->router->get("/leistungen-preise", [LeistungenpreiseController::class, "leistungenpreisePage"]);



$app->router->get("/kontakt", [KontaktController::class, "kontaktPage"]);

$app->router->get("/alluserrezensionen", [RezensionenController::class, "userrezensionenPage"]);

$app->router->get("/deleteRezensionen/{id}", [RezensionenController::class, "handleDeletePhoto"]);

$app->router->get("/editRezensionen/{id}", [RezensionenController::class, "EditRezensionenPage"]);

$app->router->get("/logout", [AuthController::class, "logoutHandler"]);




$app->run();