<div class="row cols-3">
<?php foreach($items as $item){ ?>
  
<div class="col-6 card" style="width: 18rem;">
  <img src="..." class="card-img-top" alt="...">
  <div class="card-body">
    <h5 class="card-title"><?=$item['name']?></h5>
    <h7 class="card-title"><strong><?=$item['price']?></strong></h7>
    <p class="card-text"><?=substr_replace($item['details'], '...', 80)?></p>
    <a href="itemInformation.php?id=<?=$item['id']?>" class="btn btn-primary">Show more</a>
  </div>
</div>
<?php } ?></div>