<?php
namespace Controllers;

use Core\Controller;
use Core\Request;
use Models\Rezensionen;
use Core\Application;


class rezensionenController extends Controller{
        public function rezensionenPage(){
            $user_session = (Application::$app->session->get("user"));
            $rezensionen = Rezensionen::fetchAllByIdentifier(["userid" => $user_session["id"]]);
        return $this->render("rezensionen", ["rezensionen" => $rezensionen]);
        }

public function userrezensionenPage(){
        $rezensionen = Rezensionen::fetchAll();
        return $this->render("alluserrezensionen", ["rezensionen" => $rezensionen]);
        }

public function handleDeletePhoto($request, $response){
        $photoID = $request->getRouteparams()["id"];
        Rezensionen::deleteByID($photoID);
        $response->redirect("/rezensionen");
        }


public function editRezensionenPage($request){

    $photoID = $request->getRouteparams()["id"];
    $existingRezensionen = Rezensionen::findOne(["id" => $photoID]);
    return $this->render("editRezensionen",[
        "photo" => $existingRezensionen
    ]);
    }

public function handleRezensionen(Request $request){
        $name = $_FILES['image']['name'];
        $tmp_name = $_FILES['image']['tmp_name'];
        


$photo_extension = pathinfo($name, PATHINFO_EXTENSION);
      
    $photo_ex_lc = strtolower($photo_extension);
    $allowed_exs = array("jpeg", "jpg", "png");
    if(in_array($photo_ex_lc, $allowed_exs)){
      
    $new_photo_name = uniqid("photo-", true).".".$photo_ex_lc;
    $photo_upload_path = "photo_uploads/".$new_photo_name;
    move_uploaded_file($tmp_name, $photo_upload_path);
        
      } else {
        var_dump("error");
      }



  
$user_session = (Application::$app->session->get("user"));

$rezension = new Rezensionen();
$rezension->loadData([
        "rating" => $request->getBody()["rating"],
        "description" => $request->getBody()["description"],
        "image" => $new_photo_name,
        "userid" => $user_session["id"]
    ]);

if($rezension->validate() && $rezension->save()){
    return Application::$app->response->redirect("/rezensionen");
}
         
return $this->render("rezensionen");

    }
}

