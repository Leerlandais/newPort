<?php
if (isset($errorMessage) && $errorMessage == "Sorry but you can't get in that easily.<br><a href='?home'>Return</a>") {
    die();
  }
  // var_dump($_SESSION);
  $_SESSION["np_user_permission"] < 128 ? $block = "disabled" : $block = "";
?>
<p class="h3 text-center" id="controlHeader"></p>

<form action="" method="POST" id = "add-textForm">
    <label for="selectInp" id="selectLabelName"></label>
    <input type="text" name="selectInp" id="selectInp" aria-describedby="userNameField" placeholder="selector" <?=$block?>>
    <label for="englishInp" id="enLabelName"></label>
    <input type="text" name="englishInp" id="englishInp" aria-describedby="userNameField" placeholder="english version" <?=$block?>>
    <label for="frenchInp" id="frLabelName"></label>
    <input type="text" name="frenchInp" id="frenchInp" aria-describedby="userNameField" placeholder="french version" <?=$block?>>
    <button type="submit" id="submitLogin" <?=$block?>></button>
</form>