<?php
class m0002_photos{
    public function up(){
        $db = \Core\Application::$app->db;
        $SQL = "CREATE TABLE photos (
                id INT AUTO_INCREMENT PRIMARY KEY,
                image VARCHAR(255) NOT NULL, 
                description VARCHAR(255) NOT NULL,
                rating VARCHAR(255) NOT NULL,
                userid VARCHAR(255) NOT NULL,
                created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
            )  ENGINE=INNODB;";
        $db->pdo->exec($SQL);
    }

    public function down(){
        $db = \Core\Application::$app->db;
        $SQL = "DROP TABLE users";
        $db->pdo->exec($SQL);
    }
}