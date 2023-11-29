<?php   require_once 'db.php'; ?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  <title>Item Information</title>
</head>
<body>
<?php


if(isset($_SESSION['bucket']) && !empty($_SESSION['bucket'])) {
    foreach($_SESSION['bucket'] as $itemId => $quantity) {
?>
        <div class="card">
            <form action="removeFromBucket.php" method="post">
                <input type="hidden" name="item_id" value="<?=$itemId?>">
                <button type="submit" class="btn btn-danger">Удалить из корзины</button>
            </form>
        </div>
<?php
    }
} else {
    echo "Корзина пуста";
}
?>

    <?php 
        require_once("header.php"); 
        $bucketItems = getAllFromBucket($_SESSION['user_id']);
    ?>
  <div class="container">
    <div class="row mt-3">
      <div class="col-12">
        <?php foreach($bucketItems as $item){ ?>
        <div class="card mb-3" style="max-width: 540px;">
          <div class="row g-0">
            <div class="col-md-4">
              <img src="..." class="img-fluid rounded-start" alt="...">
            </div>
            <div class="col-md-8">
              <div class="card-body">
                <h5 class="card-title"><?=$item['name']?></h5>
                <p class="card-text"><?=$item['cost']?></p>
                <p class="card-text"><small class="text-body-secondary"></small><?=$item['price']." x ".$item['amount']?></p>
              </div>
            </div>
          </div>
        </div>
      <?php } ?>
      </div>
    </div>
  </div>
</body>
</html>
