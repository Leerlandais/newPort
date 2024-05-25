<?php
if (isset($_POST["user_lang"])) {
    $_SESSION["user_lang"] = $_POST["user_lang"];
    
    $texts    = createTextByUserLang($db, $_SESSION["user_lang"]);
}



// LOGIN CALL
if (isset($_POST["userName"], 
          $_POST["userPwd"])) 
          {
              $name = standardClean($_POST["userName"]);
              $pwd  = simpleTrim($_POST["userPwd"]);
              
              $loginAttempt = attemptUserLogin ($db, $name, $pwd);
              if ($loginAttempt === true) {
                  header("Location: ./");
                  die();
                }else if ($loginAttempt === false) {
                    $title = "Incorrect Login";
                    $errorMessage = 'That be bad';
                    include "../view/public/pubhome.view.php";
                    die();
                }else {
                    include "../view/public/pubhome.view.php";
                    die();
                }
            }

    // Appel du page d'accueil public
    $title = 'Home';
    include "../view/public/pubhome.view.php";
    die ();