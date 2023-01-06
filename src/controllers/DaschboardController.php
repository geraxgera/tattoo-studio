<?php
namespace Controllers;

use Core\Controller;

class DaschboardController extends Controller{
    public function daschboardPage(){
        return $this->render("daschboard");
    }
}