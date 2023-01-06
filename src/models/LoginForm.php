<?php 

namespace Models;

use Core\Application;
use Core\DbModel;

class LoginForm extends DbModel{

    const STATUS_INACTIVE = 0;
    const STATUS_ACTIVE = 1;
    const STATUS_BLOCKED = 2;

    public string $password;
    public int $status;
    public string $username;

    public function rules(): array{
        return[
            "password" => [self::RULE_REQUIRED, [self::RULE_MIN, "min" => 8], [self::RULE_MAX, "max" => 50]],
            "username" => [self::RULE_REQUIRED, [self::RULE_MIN, "min" => 3]]
        ];
    }

    public static function attributes(): array{
        return ["password", "username"];
    }

    public static function tableName(): string{
        return "users";
    }

    public function login(){
        $user = User::findOne(["username" => $this->username]);
        if(!$user){
            $this->addError("username", self::RULE_AUTH_ERROR);
            return false;
        }
        if(!password_verify($this->password, $user->password)){
            $this->addError("password", self::RULE_AUTH_ERROR);
            return false;
        }
        $value = ["id" => $user->id, "username" => $user->username];
        Application::$app->session->set("user", $value);



        return true;
    }
}