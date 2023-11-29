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
    <title>Narxoz Shop Profile Page</title>
</head>
<body>
<?php
    require_once("header.php");
?>
    <div class="container" style="min-height:500px;">
        <div class="row mt-3">
            <div class="col-12">
                <div class="col-6 mx-auto">
                    <?php 
                        if(isset($_GET['change_success'])){
                    ?>
                            <div class="alert alert-success" role="alert">
                                Password changed successfully!!!!!!!!!!
                            </div>
                    <?php
                        } 
                    ?>
                    <?php 
                        if(isset($_GET['old_pass_error'])){
                    ?>
                            <div class="alert alert-danger" role="alert">
                                Old password isnt correct!!!!!!!!!!
                            </div>
                    <?php
                        } 
                    ?>
                    <?php 
                        if(isset($_GET['confirm_pass_error'])){
                    ?>
                            <div class="alert alert-danger" role="alert">
                                Password isnt confirmed!!!!!!!!!!
                            </div>
                    <?php
                        } 
                    ?>
                    <form action="toRegister.php" method="post">
                        <div class="row mt-3">
                            <div class="col-12">
                                <label>Name:</label>
                            </div>
                        </div>
                        <div class="row mt-2">
                            <div class="col-12">
                                <input type="text" name="name" class="form-control" value="<?=$_SESSION['name']?>" readonly>
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-12">
                                <label>Last Name:</label>
                            </div>
                        </div>
                        <div class="row mt-2">
                            <div class="col-12">
                                <input type="text" name="lastname" class="form-control" value="<?=$_SESSION['lastname']?>" readonly>
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-12">
                                <label>Username:</label>
                            </div>
                        </div>
                        <div class="row mt-2">
                            <div class="col-12">
                                <input type="text" name="login" class="form-control" value="<?=$_SESSION['login']?>" readonly>
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-12">
                                 <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                                    Change Password
                                </button>
                            </div>
                        </div>
                    </form>
                    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="staticBackdropLabel">Change Password</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                    <form action="toChangePassword.php" method="post">
                        <div class="row mt-2">
                            <div class="col-12">
                                <label>Old password:</label>
                            </div>
                        </div>
                        <div class="row mt-2">
                            <div class="col-12">
                                <input type="password" name="old_password" class="form-control" required >
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-12">
                                <label>New Password:</label>
                            </div>
                        </div>
                        <div class="row mt-2">
                            <div class="col-12">
                                <input type="password" name="password" class="form-control" required >
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-12">
                                <label>Confirm New Password:</label>
                            </div>
                        </div>
                        <div class="row mt-2">
                            <div class="col-12">
                                <input type="password" name="confirm_password" class="form-control" required>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button class="btn btn-success">Change</button>
                        </div>
                    </form>
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