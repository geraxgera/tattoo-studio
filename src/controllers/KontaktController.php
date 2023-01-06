<?php
namespace Controllers;

use Core\Controller;

class KontaktController extends Controller{
    public function kontaktPage(){
        return $this->render("kontakt");
    }
}