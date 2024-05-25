<?php

function confirmUserId($session) : bool | string {
;
    if(!isset($_SESSION["id"]) || $_SESSION["id"] !== session_id()) {
        
        return false;
      }

    return true;
}