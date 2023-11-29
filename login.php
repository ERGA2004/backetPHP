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
    <title>Narxoz Shop Login Page</title>
</head>
<body>
   <?php 
    require_once("header.php");
    if(isset($_GET['login_fail'])){
        ?>
        <div class="alert alert-danger" role="alert">
            Error!
        </div>
        <?php
    }
   ?>
    <div class="container" style="min-height:500px;">
        <div class="row mt-3">
            <div class="col-12">
                <div class="col-6 mx-auto">
                    <form action="toLogin.php" method="post">
                        <div class="row mt-3">
                            <div class="col-12">
                                <label>Username:</label>
                            </div>
                        </div>
                        <div class="row mt-2">
                            <div class="col-12">
                                <input type="text" name="login" class="form-control" required placeholder="Insert Username">
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-12">
                                <label>Password:</label>
                            </div>
                        </div>
                        <div class="row mt-2">
                            <div class="col-12">
                                <input type="password" name="password" class="form-control" required placeholder="Insert Username">
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-12">
                                <button class="btn btn-success">Sign in</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <?php require_once("footer.php"); ?>
</body>
</html>