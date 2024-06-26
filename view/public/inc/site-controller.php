<?php
if (isset($errorMessage) && $errorMessage == "Sorry but you can't get in that easily.<br><a href='?home'>Return</a>") {
    die();
  }
  // ADD TEXT TO SITE
  $_SESSION["np_user_permission"] < 128 ? $block = "disabled" : $block = "";
  ?>
  <p class="h3 text-center" id="controlHeader"></p>
<div class="container d-flex flex-row">
  <div class="container text-center">
    <fieldset class="reset"><legend  class="reset" id="addTextLegend"></legend>
    <form action="" method="POST" id = "add-textForm" class="d-flex flex-column align-items-center">
      <label for="selectInp" id="selectLabelName"></label>
      <input type="text" name="selectInp" id="selectInp" aria-describedby="userNameField" placeholder="selector" <?=$block?>>
      <label for="englishInp" id="enLabelName"></label>
      <input type="text" name="englishInp" id="englishInp" aria-describedby="userNameField" placeholder="english version" <?=$block?>>
      <label for="frenchInp" id="frLabelName"></label>
      <input type="text" name="frenchInp" id="frenchInp" aria-describedby="userNameField" placeholder="french version" <?=$block?>>
      <div class="d-flex flex-row">
      <label for="typeInpId" id="typeInpIdLabel" class="mx-2"></label>
      <input type="radio" name="typeInp" id="typeInpId" checked value="id">
      <label for="typeInpClass" id="typeInpClassLabel" class="mx-2"></label>
      <input type="radio" name="typeInp" id="typeInpClass" value="class">
      </div>
      <button type="submit" id="submitLogin" <?=$block?>></button>
    </form>
  </fieldset>
</div>



<?php 
// ADD CAROUSEL STUFF (NEED TO MOVE THE DESC TO TEXT HANDLER)
?>
<div class="container text-center">
  <fieldset class="reset"><legend  class="reset" id="addCarouselLegend"></legend>
  <form action="" method="POST" id = "add-carouselItem" class="d-flex flex-column align-items-center">
    <label for="carouselTitle" id="carouselTitle"></label>
    <input type="text" name="carouselTitle" id="carouselTitle" aria-describedby="carouselTitleField" placeholder="Title" <?=$block?>>
    <label for="carouselDescEn" id="carouselDescEn"></label>
    <input type="text" name="carouselDescEn" id="carouselDescEn" aria-describedby="carouselDescEnField" placeholder="Description Eng" <?=$block?>>
    <label for="carouselDescFr" id="carouselDescFr"></label>
    <input type="text" name="carouselDescFr" id="carouselDescFr" aria-describedby="carouselDescFrField" placeholder="Description Fr" <?=$block?>>
    <label for="carouselImg" id="carouselImg"></label>
    <input type="text" name="carouselImg" id="carouselImg" aria-describedby="carouselImgField" placeholder="Image Source" <?=$block?>>
    <label for="carouselWidth" id="carouselWidth"></label>
    <input type="text" name="carouselWidth" id="carouselWidth" aria-describedby="carouselImgWidth" placeholder="Image Width" <?=$block?>>
    <label for="carouselHeight" id="carouselHeight"></label>
    <input type="text" name="carouselHeight" id="carouselHeight" aria-describedby="carouselImgHeight" placeholder="Image Height" <?=$block?>>
    <button type="submit" id="submitCarousel" <?=$block?>></button>
  </form>
</fieldset>
</div>
</div>


<?php 
// ADD OR CHANGE CSS STUFF (UNFINISHED)
?>
<div class="container text-center">
<fieldset class="reset w-100 d-flex"><legend  class="reset" id="addCssLegend"></legend>
<div class="mb-4 d-flex flex-row flex-wrap w-auto">
  <?php
    foreach ($siteCss as $css) {
      ?>
      <div class="d-flex flex-column mx-5">
      <form method="POST" id="globalForm" class="mt-5 w-auto">
    <label for="cssSelector" class="form-label text-info"><?=$css["attrib"]?></label>
    <input type="text" name="cssSelector" style="display: none;" value="<?=$css["attrib"]?>" <?=$block?>>
    <input type="text" class="form-control" name="cssValue"  value="<?=$css["val"]?>" <?=$block?>>

    <button type="submit" class="btn btn-primary submitButton" <?=$block?>></button>
  </form>
  
  <form method="POST" id="globalFormOpt" class="mt-1 w-auto">
    
    <input type="text" name="cssReset" style="display: none;" value="<?=$css["attrib"]?>">
    <button type="submit" class="btn btn-primary undoButton" name="undoChange"  <?=$block?>></button>
    <button type="submit" class="btn btn-primary resetButton" name="resetDefault"  <?=$block?>></button>
  </form> 
</div>
  
    <?php
    }
    ?>
    </div>
</fieldset>
</div>