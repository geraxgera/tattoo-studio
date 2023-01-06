<?php

require_once __DIR__ . "/vendor/autoload.php";


use Core\Application;



$config = [
    "db" => [
        "dsn" => "mysql:host=db;",
        "dbName" => "my_first_mvc",
        "user" => "root",
        "password" => "php_mvc",
    ]
];



$app = new Application(__DIR__, $config);

$app->db->applyMigrations();