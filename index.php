<?php
    require_once("db.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <title>Narxoz Shop</title>
</head>
<body>
    <?php 
        require_once("header.php"); 
    ?>
    <div class="container" style="min-height:470px;">
        <div class="row mt-3">
            <div class="col-12">
                <?php
                    if(isset($_GET['delete_success'])){
                ?>
                    <div class="alert alert-success" role="alert">
                        Item deleted successfullyyyy!
                    </div>
                <?php
                    }
                    if(isset($_GET['login_success'])){
                ?>
                        <div class="alert alert-success" role="alert">
                            Logged successfullyyyy!
                        </div>
                <?php
                    }
                ?>
                <?php 
                    $items = getAllItems();
                    if(isset($_SESSION['role'])){
                        if($_SESSION['role'] === 'admin'){
                ?>
                <table class="table table-striped">
                    <thead>
                        <tr> 
                            <th>ID</th>
                            <th>Name</th>
                            <th>Price</th>
                            <th>Amount</th>
                            <th>Countries</th>
                            <th>Category</th>
                            <th width="10%;">Details</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            
                            if($items!=null){
                                foreach ($items as $item) {
                        ?>
                            <tr>
                                <td><?=$item['id']?></td>
                                <td><?=$item['name']?></td>
                                <td><?=$item['price']?></td>
                                <td><?=$item['amount']?></td>
                                <td><?=$item['country_name']." / ".$item['code']?></td>
                                <td><?=$item['category']?></td>
                                <td><a href="details.php?id=<?=$item['id']?>" class="btn btn-primary btn-sm">Details</a></td>
                            </tr>
                        <?php
                                }
                            }
                            
                        ?>
                    </tbody>
                </table>
            <?php }
                else {
                    require_once 'index_user.php';
                }
             } else require_once 'index_user.php'; ?>
            </div>
        </div>
    </div>
    <?php require_once("footer.php"); ?>
</body>
</html>