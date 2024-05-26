<?php

function getAllCarouselItems(PDO $db) : array | string {
    $sql = "SELECT *
            FROM `np_carousel`";

    $query = $db->query($sql);

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


function addNewCarouselItem(PDO $db, 
                            string $title, 
                            string $desc, 
                            string $img, 
                            string $imgW, 
                            string $imgH) : bool | string 
                        {

    $sql = "INSERT INTO `np_carousel`
                        (`np_carousel_title`,
                         `np_carousel_desc`,
                         `np_carousel_img`,
                         `np_carousel_width`, 
                         `np_carousel_height`) 
            VALUES (?,?,?,?,?)";
    $stmt = $db->prepare($sql);
    $stmt->bindValue(1, $title);
    $stmt->bindValue(2, $desc);
    $stmt->bindValue(3, $img);
    $stmt->bindValue(4, $imgW);
    $stmt->bindValue(5, $imgH);

    try{
        $stmt->execute();
        return true;

    }catch(Exception){
        $errorMessage = "Couldn't create user";
        return $errorMessage;
    }
    
}