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
        $_POST["frenchInp"],
        $_POST["typeInp"]
        )
    ){
    $selector = standardClean($_POST["selectInp"]);
    $english  = standardClean($_POST["englishInp"]);
    $french   = standardClean($_POST["frenchInp"]);
    $type     = standardClean($_POST["typeInp"]);
    
    $addNewSelector = addNewSelector($db, $selector, $english, $french, $type);
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

// UPDATE GLOBAL CSS
if (isset($_POST["cssSelector"],
          $_POST["cssValue"])) {

$value      = standardClean($_POST["cssValue"]);
$attrib     = standardClean($_POST["cssSelector"]);

$changeCSS  = updateGlobalCss($db, $value, $attrib);

}


// UNDO CHANGE TO GLOBAL
if (isset($_POST["undoChange"])) {
$selector   = standardClean($_POST["cssReset"]);    
$undo       = undoChangeToGlobal($db, $selector);
}

// RESET TO DEFAULT
if (isset($_POST["resetDefault"])) {
$selector   = standardClean($_POST["cssReset"]);        
$reset      = resetGlobalToDefault($db, $selector);
}


    $carouselItems = getAllCarouselItems($db);
    
    include "../view/public/pubhome.view.php";