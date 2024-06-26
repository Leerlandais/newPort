<?php

function getAllCss (PDO $db) {
    $sql = "SELECT `np_css_selector` AS selector,
                   `np_css_attribute` AS attrib, 
                   `np_css_value` AS val, 
                   `np_css_old_val` AS old_val, 
                   `np_css_def_val` AS def_val 
            FROM `np_css`";
    try{
        $query = $db->query($sql);
        if ($query->rowCount()===0) return false;

        $result = $query->fetchAll();
        $query->closeCursor();
    
        return $result;
    }catch(Exception $e) {
        $e->getMessage();
    }
}


// NEED TO CORRECT ALL OF THE FOLLOWING FUNCTIONS AS WELL AS ADD THEM TO THE PRIVATE CONTROLLER

// START WITH THIS ONE - CHANGE THE SQL TO MATCH THE ACTUAL DB (AND NOT THE OLD ONE) - SAME FOR ALL OTHER FUNCTIONS BELOW

function updateGlobalCss(PDO $db, string $value, string $attrib) : bool | string {

    $sqlCopy = "SELECT `np_css_value` 
                FROM `np_css` 
                WHERE `np_css_attribute` = ?"; 

    $stmtCopy   = $db->prepare($sqlCopy);
    $stmtCopy->execute([$attrib]);
    $result  = $stmtCopy->fetch();

    
    $sqlOld  = "UPDATE `np_css`
                SET `np_css_old_val` = ? 
                WHERE `np_css_attribute` = ?";

    $sqlNew  = "UPDATE `np_css`
                SET `np_css_value` = ?
                WHERE `np_css_attribute` = ?";
    try {
    $stmtOld = $db->prepare($sqlOld);
    $stmtOld->bindValue(1, $result["np_css_value"]);
    $stmtOld->bindValue(2, $attrib);
    $stmtNew = $db->prepare($sqlNew);
    $stmtNew->bindValue(1, $value);
    $stmtNew->bindValue(2, $attrib);
        $stmtOld->execute();
        $stmtNew->execute();
        return true;
    }catch(Exception $e) {
        return $e->getMessage();
    } 

}

function undoChangeToGlobal($db, $attrib) {
    $sqlUndo = "SELECT `np_css_old_val`
                FROM `np_css`
                WHERE `np_css_attribute` = ?";
    $stmtUndo = $db->prepare($sqlUndo);
    $stmtUndo->bindValue(1, $attrib);
    $stmtUndo->execute();
    $result = $stmtUndo->fetch();
 
// var_dump($result["old_val"]);
// die();
    $sqlReplace = "UPDATE `np_css`
                   SET `np_css_value` = ?
                   WHERE `np_css_attribute` = ?";
    $stmtReplace = $db->prepare($sqlReplace);
    try {
    
        $stmtReplace->bindValue(1, $result["np_css_old_val"]);
        $stmtReplace->bindValue(2, $attrib);
        $stmtReplace->execute();
        if ($stmtReplace->rowCount()=== 0) {
            return false;
        }
        return true;
    }catch(Exception $e) {
        return $e->getMessage();
    }
}

function resetGlobalToDefault($db, $selector) {
    $sqlReset = "SELECT `np_css_def_val`
                FROM `np_css`
                WHERE `np_css_attribute` = ?";
    $stmtReset = $db->prepare($sqlReset);
    $stmtReset->bindValue(1, $selector);
    $stmtReset->execute();
    $result = $stmtReset->fetch();
    $sqlReplace = "UPDATE `np_css`
                   SET `np_css_value` = ?
                   WHERE `np_css_attribute` = ?";
    $stmtReplace = $db->prepare($sqlReplace);
    try {
        $stmtReset->execute();
        $stmtReplace->bindValue(1, $result["np_css_def_val"]);
        $stmtReplace->bindValue(2, $selector);
        $stmtReplace->execute();
        if ($stmtReplace->rowCount()=== 0) {
            return false;
        }
        return true;
    }catch(Exception $e) {
        return $e->getMessage();
    }
}
