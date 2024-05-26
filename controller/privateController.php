<?php
$siteCss = getAllCss($db);

$title = 'homeAdmin';
// LOGOUT CALL
if (isset($_GET["logout"])) {
    include_once("../model/logoutModel.php"); 
    die();   
}

// LANGUAGE SELECTION
if (isset($_POST["user_lang"])) {
    $_SESSION["user_lang"] = $_POST["user_lang"];
    
    $texts    = createTextByUserLang($db, $_SESSION["user_lang"]);
}
 

// CONTROL CALL AND PROTECTION
if (isset($_GET["controls"])) {
    $checkUserLevel = confirmUserId($_SESSION);

    if ($checkUserLevel === false) {
        $errorMessage = "Sorry but you can't get in that easily";
        header('Location: /');
      //  die();
        
    }  
    $title = "Site Controller";
}


// ADD TEXT
if (isset(
        $_POST["selectInp"],
        $_POST["englishInp"],
        $_POST["frenchInp"]
        )
    ){
    $selector = standardClean($_POST["selectInp"]);
    $english  = standardClean($_POST["englishInp"]);
    $french   = standardClean($_POST["frenchInp"]);
    
    $addNewSelector = addNewSelector($db, $selector, $english, $french);
        }
    
// ADD CAROUSEL ITEM
if (isset(
          $_POST["carouselTitle"],
          $_POST["carouselDescEn"],
          $_POST["carouselDescFr"],
          $_POST["carouselImg"],
          $_POST["carouselWidth"],
          $_POST["carouselHeight"]
          )
    ){
       $title   = standardClean($_POST["carouselTitle"]);
       $descEn  = standardClean($_POST["carouselDescEn"]);
       $descFr  = standardClean($_POST["carouselDescFr"]);
       $img     = standardClean($_POST["carouselImg"]);
       $imgW    = standardClean($_POST["carouselWidth"]);
       $imgH    = standardClean($_POST["carouselHeight"]);

    $addNewCarousel = addNewCarouselItem($db, $title, $descEn, $descFr, $img, $imgW, $imgH);
    }


    $carouselItems = getAllCarouselItems($db);
    
    include "../view/public/pubhome.view.php";