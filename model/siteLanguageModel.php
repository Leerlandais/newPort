<?php




function createTextByUserLang(PDO $db, string $userLang) : array | string {

$userLang === "en" ? 
    $lang = "np_site_en" :
    $lang = "np_site_fr";

    $sql = "SELECT `np_site_selector` AS `selector`, $lang AS `theText`, `np_site_type` AS theType  
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



function addNewSelector(PDO $db, string $selector, string $english, string $french, $type) : bool | string {
    $sql = "INSERT INTO `np_site`
                        (`np_site_selector`,
                         `np_site_en`,
                         `np_site_fr`,
                         `np_site_type`)
            VALUES (?,?,?, ?)";

    $stmt = $db->prepare($sql);
    $stmt->bindValue(1, $selector);
    $stmt->bindValue(2, $english);
    $stmt->bindValue(3, $french);
    $stmt->bindValue(4, $type);

    try{
        $stmt->execute();
        return true;

    }catch(Exception){
        $errorMessage = "Couldn't add that";
        return $errorMessage;
    }
}