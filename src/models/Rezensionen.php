<?php 

namespace Models;
use Core\DbModel;

class Rezensionen extends DbModel{


    public string $image;
    public string $description;
    public int $rating;
    public string $userid;

    public function rules(): array{
        return[
            "image" => [self::RULE_REQUIRED],
            "description" => [self::RULE_REQUIRED, [self::RULE_MIN, "min" => 10], [self::RULE_MAX, "max" => 150]],
            "rating" => [self::RULE_REQUIRED],
            "userid" => [self::RULE_REQUIRED]
        ];
    }

    public static function attributes(): array{
        return ["image", "description", "rating", "userid"];
    }

    public static function tableName(): string{
        return "photos";
    }

    public function save(){
        return parent::save();
    }

}