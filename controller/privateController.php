<?php

$title = 'homeAdmin';

if (isset($_GET["logout"])) {
    include_once("../model/logoutModel.php"); 
    die();   
}
if (isset($_POST["user_lang"])) {
    $_SESSION["user_lang"] = $_POST["user_lang"];
    
    $texts    = createTextByUserLang($db, $_SESSION["user_lang"]);
}

if (isset($_GET["controls"])) {
    $checkUserLevel = confirmUserId($_SESSION);

    if ($checkUserLevel === false) {
        $errorMessage = "Sorry but you can't get in that easily";
        header('Location: /');
      //  die();
        
    }  
    $title = "Site Controller";
}
    
    // Appel du page d'accueil Admin

    
    include "../view/public/pubhome.view.php";