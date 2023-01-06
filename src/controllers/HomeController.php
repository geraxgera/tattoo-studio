<?php

namespace Controllers;

use Core\Application;
use Core\Controller;

class HomeController extends Controller{

    public function homePage(){  
        return $this->render("home");
    }


}