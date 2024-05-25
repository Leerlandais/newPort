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



function addNewSelector(PDO $db, string $selector, string $english, string $french) : bool | string {
    $sql = "INSERT INTO `np_site`
                        (`np_site_selector`,
                         `np_site_en`,
                         `np_site_fr`)
            VALUES (?,?,?)";

    $stmt = $db->prepare($sql);
    $stmt->bindValue(1, $selector);
    $stmt->bindValue(2, $english);
    $stmt->bindValue(3, $french);

    try{
        $stmt->execute();
        return true;

    }catch(Exception){
        $errorMessage = "Couldn't add that";
        return $errorMessage;
    }
}