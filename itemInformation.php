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
        require_once("header.php"); 
        $itemId = $_GET['id'];
        $item = getItem($itemId);
        if(isset($_GET['addedToBucket'])){
          echo 'Item Added To The Bucket';
        }
        if(isset($_GET['amount_err'])){
          echo 'Item isnt in the stock';
        }
    ?>
  <div class="container">
    <div class="row mt-3">
      <div class="col-12">
        <div class="card mb-3" style="max-width: 540px;">
          <div class="row g-0">
            <div class="col-md-4">
              <img src="..." class="img-fluid rounded-start" alt="...">
            </div>
            <div class="col-md-8">
              <div class="card-body">
                <h5 class="card-title"><?=$item['name']?></h5>
                <p class="card-text"><?=$item['details']?></p>
                <p class="card-text"><small class="text-body-secondary"><?=$item['price']?></small></p>
                <p class="card-text"><small class="text-body-secondary"><?=$item['country_name']." / ".$item['code']?></small></p>
              </div>
              <form action="addToBucket.php" method="post">
                <input type="hidden" name="item_id" value="<?=$item['id']?>">
                <input type="number" name="amount" class="form-control">
                <button class="btn btn-success mt-2">Add to bucket</button>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</body>
</html>
