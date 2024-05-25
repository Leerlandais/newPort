<?php




function createTextByUserLang(PDO $db, string $userLang) : array | string {

$userLang === "en" ? 
    $lang = "np_site_en" :
    $lang = "np_site_fr";

    $sql = "SELECT `np_site_selector` as `selector`, $lang as `theText`
            FROM `np_site`";

try{
$query = $db->query($sql);
if ($query->rowCount() === 0) {
$errorMessage = "Something went wrong getting site text";
return $errorMessage; 
}else {
$result = $query->fetchAll();
$query->closeCursor();
return $result;
} 

}catch(Exception $e) {
return $e->getMessage();
}

}