<div class="container">
    <div class="row">
        <div class="col-12">
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">Narxoz Shop</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="index.php">Home</a>
                    </li>
                    
                    <?php
                        if(!isset($_SESSION['user_id'])){
                    ?>
                        <li class="nav-item">
                            <a class="nav-link" aria-current="page" href="login.php">Login</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="registration.php">Registration</a>
                        </li>
                    <?php } else {
                        if($_SESSION['role'] === 'admin'){
                        ?>
                        <li class="nav-item">
                            <a class="nav-link" href="additem.php">Add Item</a>
                        </li>
                    <?php } else if($_SESSION['role']==='user'){?>
                        <li class="nav-item">
                            <a class="nav-link" href="bucket.php">Bucket</a>
                        </li>
                    <?php } ?>
                        <li class="nav-item">
                            <a class="nav-link" aria-current="page"><?=$_SESSION['name']?></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" aria-current="page"><?=$_SESSION['lastname']?></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" aria-current="page" href="profile.php">Profile</a>
                        </li>
                         <li class="nav-item">
                            <a class="nav-link" aria-current="page" href="logout.php">Logout</a>
                        </li>
                    <?php } ?>
                </div>
            </div>
        </nav>
        </div>
    </div>
</div>
