<?php
if (isset($_POST["user_lang"])) {
    $_SESSION["user_lang"] = $_POST["user_lang"];
    
    $texts    = createTextByUserLang($db, $_SESSION["user_lang"]);
}



// LOGIN CALL
if (isset($_POST["nameInp"], $_POST["passInp"])) {
    $name = standardClean($_POST["nameInp"]);
    $pass = simpleTrim($_POST["passInp"]);
        
    $loginAttempt = attemptUserLogin ($db, $name, $pass);
    if ($loginAttempt === true) {
        header("Location: ./");
        die();
    }else {
        
    // Appel du page d'accueil public
    $title = 'Incorrect Login';
    include "../view/public/pubhome.view.php";
    die ();
}
}

$title = 'Home';
include "../view/public/pubhome.view.php";
die ();