<?php 
    require_once 'db.php';
    if(isset($_GET['id'])){
        if(deleteItem($_GET['id'])){
            header("location:index.php?delete_success");
        }
    }
?>