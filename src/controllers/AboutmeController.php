<?php
namespace Controllers;

use Core\Controller;

class aboutmeController extends Controller{
    public function aboutmePage(){
        return $this->render("about-me");
    }
}