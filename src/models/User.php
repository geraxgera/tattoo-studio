<?php 

namespace Models;
use Core\DbModel;

class User extends DbModel{

    const STATUS_INACTIVE = 0;
    const STATUS_ACTIVE = 1;
    const STATUS_BLOCKED = 2;

    public string $email;
    public string $password;
    public int $status;
    public string $username;

    public function rules(): array{
        return[
            "email" => [self::RULE_REQUIRED, self::RULE_EMAIL, [self::RULE_UNIQUE, "class" => self::class]],
            "password" => [self::RULE_REQUIRED, [self::RULE_MIN, "min" => 8], [self::RULE_MAX, "max" => 50]],
            "username" => [self::RULE_REQUIRED, [self::RULE_MIN, "min" => 3], [self::RULE_UNIQUE, "class" => self::class]]
        ];
    }

    public static function attributes(): array{
        return ["email", "password", "username"];
    }

    public static function tableName(): string{
        return "users";
    }

    public function save(){
        $this->status = self::STATUS_INACTIVE;
        $this->password = password_hash($this->password, PASSWORD_DEFAULT);
        return parent::save();
    }

}