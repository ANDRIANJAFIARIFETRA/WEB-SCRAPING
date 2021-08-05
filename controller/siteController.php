<?php 

require '../config/modules.php';

if(isset($_POST["formRegister"])){

    $nom = $_POST['nom_site'];
    $url = $_POST['url_site'];
    $code = $_POST['code_site'];
    $data = array(
        "nom_site" => $nom, 
        "url_site" => $url
    );

    $existed_value = $database->select("site", "*", "nom_site = '".$nom."' OR url_site = '".$url."'");
    if(count($existed_value) > 0 || !empty($code)){
        $existed = json_encode($existed_value[0]);
        $update = $database->update("site", $data, "code_site = '".$code."'");
        if($update){
            echo $update;
            routes('/accueil');
        }
    }else{
        
       $insert = $database->insert("site", $data);
       if($insert){
            routes('/accueil');
       }
    }

}else{
   
}
