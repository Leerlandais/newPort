<?php
session_start(); 
if(!isset($_SESSION["user_lang"])) $_SESSION["user_lang"] = "en";   

require_once("../config.php");
require_once("../controller/dbConnectController.php");
require_once("../model/laundryModel.php");
require_once("../model/siteProtectionModel.php");
require_once("../model/siteCssModel.php");
require_once("../model/siteLanguageModel.php");
require_once("../model/siteCarouselModel.php");
require_once("../controller/jsonController.php");
require_once("../model/loginModel.php");

if (isset($_SESSION["id"]) && ($_SESSION["id"]) === session_id()) {
    require_once('../controller/privateController.php');
}else {
    require_once("../controller/publicController.php");
}

$db = null;