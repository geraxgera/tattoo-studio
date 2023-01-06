<?php

namespace Core;

abstract class DbModel extends Model{
    abstract public static function tableName(): string;

    abstract public static function attributes(): array;
    
    public function save(){
        $tableName = $this->tableName();
        $attributes = $this->attributes();
        $params = array_map(fn($attr) => ":$attr", $attributes);
        $statement = self::prepare("INSERT INTO $tableName (".implode(',', $attributes).") VALUES(".implode(',', $params).")");
        foreach($attributes as $attribute){
            $statement->bindValue(":$attribute", $this->{$attribute});
        }

        $statement->execute();
        return true;
    }

    public static  function findOne($where){
        $tableName = static::tableName();
        $attributes = array_keys($where);
        $sql = implode("AND", array_map(fn($attr) => "$attr = :$attr", $attributes));
        $statement = self::prepare("SELECT * FROM $tableName WHERE $sql");
        foreach ($where as $key => $item) {
        $statement->bindValue(":$key", $item);
        }
        $statement->execute();
        return $statement->fetchObject(static::class);
    }

    public static function prepare($sql){
       return Application::$app->db->pdo->prepare($sql);
    }

public static function fetchAll(){
    $tableName = static::tableName();
    $pdo = Application::$app->db->pdo;
    $sql = "SELECT * FROM $tableName";
    $statement = $pdo->query($sql);
    return $statement->fetchAll(\PDO::FETCH_ASSOC);
} 

public static function fetchAllByIdentifier(array $identifier){
    $firstKey = array_key_first($identifier);
    $firstValue = $identifier[$firstKey];
    $tableName = static::tableName();
    $pdo = Application::$app->db->pdo;
    $sql = "SELECT * FROM $tableName WHERE $firstKey = $firstValue";
    $statement = $pdo->query($sql);
    return $statement->fetchAll(\PDO::FETCH_ASSOC);
}

public static function deleteByID(string $id){
    $tableName = static::tableName();
    $statement = Application::$app->db->pdo->prepare($sql = "DELETE FROM `$tableName` WHERE `id` = :id");
    $statement->execute(["id" => $id]);
}

}