<?php
require '../config/modules.php';
// var_dump($_POST);
$user = $database->select("utilisateur", "*", "username = '".$_POST['username']."'");


if(count($user) > 0){
    // echo json_encode($user);
    if($user->username === $_POST['username'] && $user->password === $_POST['password']){
        addToCookie("user", json_encode($user, true), 2);
        routes('/accueil');
    }else{
        setSession("error", "Nom d'utilisateur ou mot de passe incorrect");
        routes('/login');
    }

}else{
    setSession("error", "Utilisateur non reconnu");
    routes('/login');
}

// routes("/pages");