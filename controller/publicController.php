<?php
$title = 'Home';

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


// USER CREATION
if (isset(
    $_POST["newNomInp"],
           $_POST["firstInp"],
           $_POST["secondInp"],
           $_POST["emailInp"],
           $_POST["newPwdInp"],
           $_POST["language"]
           )
           ){
               $user     = standardClean($_POST["newNomInp"]);
               $first    = standardClean($_POST["firstInp"]);
               $second   = standardClean($_POST["secondInp"]);
               $email    = emailClean($_POST["emailInp"]);
               $cryptPWD = password_hash($_POST["newPwdInp"],PASSWORD_DEFAULT);
               $lang     = standardClean($_POST["language"]);
               
               $createLogin = createNewUser($db,
               $user,
               $first,
               $second,
               $email,
               $cryptPWD,
               $lang);

               if ($createLogin === true) {
                $loginNewUser = attemptUserLogin($db, $user, $_POST["newPwdInp"]);
                if ($loginNewUser === true) {
                    header("Location: ./");
                    die();
                 }else {
                     $errorMessage = "Couldn't log in after creation";    
                 }
                }else {
                    $errorMessage = "That username already exists";
                }
            }


    if (isset($_GET["controls"])) {
        $checkUserLevel = confirmUserId($_SESSION);

        if ($checkUserLevel === false) {
            $errorMessage = "Sorry but you can't get in that easily.<br><a href='?home'>Return</a>";
            
        }  
        $title = "Site Controller";
    }
    

include "../view/public/pubhome.view.php";
die ();