<?php

namespace Core;

class Database{
    public \PDO $pdo;

    public function __construct(array $config)
    {
        
        $dsn = $config["dsn"] ?? "";
        $user = $config["user"] ?? "";
        $password = $config["password"] ?? "";
        $dbName = $config["dbName"];

        $this->pdo = new \PDO($dsn, $user,  $password);
        $this->pdo->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);

        $this->pdo->query("CREATE DATABASE IF NOT EXISTS $dbName");
        $this->pdo->query("use $dbName");
    }

    public function applyMigrations(){
        $this->createMigrationsTable();
        $appliedMigrations = $this->getAppliedMigrations();

        $newMigrations = [];
        $files = scandir(Application::$ROOT_DIR."/migrations");
        $toApplyMigrations = array_diff($files, $appliedMigrations);

        foreach($toApplyMigrations as $migration){
            if($migration === "." || $migration === ".."){
                continue;
            }

            require_once Application::$ROOT_DIR."/migrations/".$migration;
            $className = pathinfo($migration, PATHINFO_FILENAME);
            $instance = new $className();
            echo "Appling Migration $migration".PHP_EOL;
            $instance->up();
            echo "Applied Migration $migration".PHP_EOL;
            $newMigrations[] = $migration;
        }

        if(!empty($newMigrations)){
            $this->saveMigrations($newMigrations);
        }else{
            echo "All migrations are applied".PHP_EOL;
        }
    }

    public function createMigrationsTable(){
        $this->pdo->exec("CREATE TABLE IF NOT EXISTS migrations (
            id INT AUTO_INCREMENT PRIMARY KEY,
            migration VARCHAR(255),
            created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
        )  ENGINE=INNODB;");
    }

    public function getAppliedMigrations(){
       $statement = $this->pdo->prepare("SELECT migration from migrations");
       $statement->execute();

       return $statement->fetchAll(\PDO::FETCH_COLUMN);
    }

    public function saveMigrations(array $newMigrations){
        $str = implode(',', array_map(fn($m) => "('$m')", $newMigrations));
        $statement = $this->pdo->prepare("INSERT INTO migrations (migration) VALUES 
            $str
        ");
        $statement->execute();
    }
}