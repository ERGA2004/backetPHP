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
        require_once("db.php");
        $item = getItem($_GET['id']);
    ?>
    <div class="container" style="min-height:500px;">
        <div class="row mt-3">
            <div class="col-12">
                <div class="col-6 mx-auto">
                    <?php
                        if(isset($_GET['success'])){
                    ?>
                            <div class="alert alert-success" role="alert">
                                Item edited successfully!!!!!!!!!!
                            </div>
                    <?php
                        }
                    ?>
                    <form action="" method="post">
                        <div class="row mt-3">
                            <div class="col-12">
                                <label>Name:</label>
                            </div>
                        </div>
                        <div class="row mt-2">
                            <div class="col-12">
                                <input type="text" name="name" class="form-control" value="<?=$item['name']?>" readonly>
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-12">
                                <label>Price:</label>
                            </div>
                        </div>
                        <div class="row mt-2">
                            <div class="col-12">
                                <input type="number" name="price" class="form-control" value="<?=$item['price']?>" readonly>
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-12">
                                <label>Amount:</label>
                            </div>
                        </div>
                        <div class="row mt-2">
                            <div class="col-12">
                                <input type="number" name="amount" class="form-control" value="<?=$item['amount']?>" readonly>
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-12">
                                <label>Category:</label>
                            </div>
                        </div>
                        <div class="row mt-2">
                            <div class="col-12">
                                <input type="text" name="category" class="form-control" value="<?=$item['category']?>" readonly>
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-12">
                                <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                                    EDIT
                                </button>
                                <a type="button" href="delete.php?id=<?=$item['id']?>" class="btn btn-danger" >
                                    DELETE
                                </a>
                            </div>
                        </div>                         
                    </form>
<!-- Modal -->
                <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="staticBackdropLabel">Edit Item</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                    <form action="editItem.php" method="post">
                        <input type="hidden" name="id" value="<?=$item['id']?>">
                        <div class="row mt-2">
                            <div class="col-12">
                                <label>Name:</label>
                            </div>
                        </div>
                        <div class="row mt-2">
                            <div class="col-12">
                                <input type="text" name="name" class="form-control" required value="<?=$item['name']?>">
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-12">
                                <label>Price:</label>
                            </div>
                        </div>
                        <div class="row mt-2">
                            <div class="col-12">
                                <input type="number" name="price" class="form-control" required value="<?=$item['price']?>">
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-12">
                                <label>Amount:</label>
                            </div>
                        </div>
                        <div class="row mt-2">
                            <div class="col-12">
                                <input type="number" name="amount" class="form-control" required value="<?=$item['amount']?>">
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-12">
                                <label>Description:</label>
                            </div>
                        </div>
                        <div class="row mt-2">
                            <div class="col-12">
                                <input type="text" name="details" class="form-control" required value="<?=$item['details']?>">
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button class="btn btn-success">Save</button>
                        </div>
                    </form>
        </div>
        </div>
    </div>
    </div>
                    
                </div>
            </div>
        </div>
    </div>
    <?php require_once("footer.php"); ?>
</body>
</html>