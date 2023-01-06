<?php

namespace Controllers;

use Core\Application;
use Core\Controller;
use Core\Request;
use Models\User;
use Core\Response;
use Models\LoginForm;


class AuthController extends Controller{

    public function loginPage(){
        return $this->render("login");
    }

    public function loginFormHandler(Request $request, Response $response){
        $loginForm = new LoginForm();
        $loginForm->loadData($request->getBody());

        if($loginForm->validate() && $loginForm->login()){
            Application::$app->session->setFlash("erfolgreich", "Eingelogt!");
            return $response->redirect("/");

        }

        return $this->render("login", ["user" => $loginForm]);
    }

    public function logoutHandler(Request $request, Response $response){
        unset($_SESSION["user"]);
        return $response->redirect("/");
    }

    public function registerPage(){
        return $this->render("register");
    }

    public function registerFormHandler(Request $request, Response $response){
        
        $user = new User();
        $user->loadData($request->getBody());

        if($user->validate() && $user->save()){
            $existingUser = User::findOne(["username" => $user->username]);
            if($user->validate() && $user->save()){

            $existingUser = User::findOne(["username" => $user->username]);
            $value = ["id" => $existingUser->id, "username" => $existingUser->username];
            Application::$app->session->set("user", $value);
            
            $value = ["id" => $existingUser->id, "username" => $existingUser->username];
            Application::$app->session->set("user", $value);

            return $response->redirect("/daschboard");

        }
        return $this->render("register", ["user" => $user]);
    }
}
}