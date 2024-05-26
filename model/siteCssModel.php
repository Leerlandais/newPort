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

function updateGlobalCss(PDO $db, string $value, string $selector){  // don't forget to set  : bool | string once done

    $sqlCopy = "SELECT `value` 
                FROM `global_css` 
                WHERE `selector` = ?"; 

    $stmtCopy   = $db->prepare($sqlCopy);
    $stmtCopy->execute([$selector]);
    $result  = $stmtCopy->fetch();

    
    $sqlOld  = "UPDATE `global_css`
                SET `old_val` = ? 
                WHERE `selector` = ?";

    $sqlNew  = "UPDATE `global_css`
                SET `value` = ?
                WHERE `selector` = ?";
    try {
    $stmtOld = $db->prepare($sqlOld);
    $stmtOld->bindValue(1, $result["value"]);
    $stmtOld->bindValue(2, $selector);
    $stmtNew = $db->prepare($sqlNew);
    $stmtNew->bindValue(1, $value);
    $stmtNew->bindValue(2, $selector);
        $stmtOld->execute();
        $stmtNew->execute();
        return $result;
    }catch(Exception $e) {
        return $e->getMessage();
    } 

}

function undoChangeToGlobal($db, $selector) {
    $sqlUndo = "SELECT `old_val`
                FROM `global_css`
                WHERE `selector` = ?";
    $stmtUndo = $db->prepare($sqlUndo);
    $stmtUndo->bindValue(1, $selector);
    $stmtUndo->execute();
    $result = $stmtUndo->fetch();
 
// var_dump($result["old_val"]);
// die();
    $sqlReplace = "UPDATE `global_css`
                   SET `value` = ?
                   WHERE `selector` = ?";
    $stmtReplace = $db->prepare($sqlReplace);
    try {
    
        $stmtReplace->bindValue(1, $result["old_val"]);
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

function resetGlobalToDefault($db, $selector) {
    $sqlReset = "SELECT `def_val`
                FROM `global_css`
                WHERE `selector` = ?";
    $stmtReset = $db->prepare($sqlReset);
    $stmtReset->bindValue(1, $selector);
    $stmtReset->execute();
    $result = $stmtReset->fetch();
    $sqlReplace = "UPDATE `global_css`
                   SET `value` = ?
                   WHERE `selector` = ?";
    $stmtReplace = $db->prepare($sqlReplace);
    try {
        $stmtReset->execute();
        $stmtReplace->bindValue(1, $result["def_val"]);
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
