<?php
namespace Controllers;

use Core\Controller;

class LeistungenpreiseController extends Controller{
    public function leistungenpreisePage(){
        return $this->render("leistungen-preise");
    }
}