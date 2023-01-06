<?php
namespace Controllers;

use Core\Controller;

class ImageUploadController extends Controller{
    public function imageuploadPage(){
        return $this->render("imageupload");
    }
}