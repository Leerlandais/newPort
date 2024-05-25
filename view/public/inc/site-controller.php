<?php
if (isset($errorMessage) && $errorMessage == "Sorry but you can't get in that easily.<br><a href='?home'>Return</a>") {
    die();
  }
?>
<p class="h3 text-center" id="controlHeader"></p>

<form action="" method="POST" id = "add-textForm">
    <label for="selectInp" id="selectLabelName"></label>
    <input type="text" name="selectInp" id="selectInp" aria-describedby="userNameField" placeholder="selector">
    <label for="englishInp" id="enLabelName"></label>
    <input type="text" name="englishInp" id="englishInp" aria-describedby="userNameField" placeholder="english version">
    <label for="frenchInp" id="frLabelName"></label>
    <input type="text" name="frenchInp" id="frenchInp" aria-describedby="userNameField" placeholder="french version">
    <button type="submit" id="submitLogin"></button>
</form>