

<div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-indicators">
        <?php
  $i = 0;
  foreach($carouselItems as $item) {
      if ($i === 0) {
          ?>
<button type="button" data-bs-target="#carouselExampleIndicators" class="active" data-bs-slide-to="<?=$i?>"aria-current="true" aria-label="Slide <?=($i+1)?>"></button>
<?php
}else {
    ?>
<button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="<?=$i?>"aria-current="true" aria-label="Slide <?=($i+1)?>"></button>
<?php
}
$i++;
}
?>
</div>
  

  
  <div class="carousel-inner">
<?php
    $j = 0;
    foreach($carouselItems as $item) {
        if ($j === 0) {
?>
    <div class="carousel-item active">
      <img src="<?=$item["np_carousel_img"]?>" class="d-block w-25 my-0 mx-auto"  alt="<?=$item["np_carousel_title"]?>">
           <div class="carousel-caption d-none d-md-block">
        <h5 class="text-light"><?=$item["np_carousel_title"]?></h5>
        <p id="carouselDesc<?=$j?>" class="text-light"></p>
      </div>

    </div>
<?php
}else {
?>
    <div class="carousel-item">
      <img src="<?=$item["np_carousel_img"]?>" class="d-block w-25 my-0 mx-auto"  alt="<?=$item["np_carousel_title"]?>">
           <div class="carousel-caption d-none d-md-block">
           <h5 class="text-light"><?=$item["np_carousel_title"]?></h5>
        <p id="carouselDesc<?=$j?>" class="text-light"></p>
      </div>

    </div>
<?php
}
$j++;
}
?>
</div>

  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
    <span class="carousel-control-prev-icon bg-dark" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
    <span class="carousel-control-next-icon bg-dark" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>
</div>