<?php
    require_once 'db.php';
    if($_SERVER['REQUEST_METHOD']==='POST'){
        if(isset($_POST['name']) && isset($_POST['price']) && isset($_POST['amount'])){
            if(editItem($_POST['name'], $_POST['price'], $_POST['amount'], $_POST['id'], $_POST['details'])){
                header('location:details.php?id='.$_POST['id'].'&&success');
            };
            
        }
    }
?>