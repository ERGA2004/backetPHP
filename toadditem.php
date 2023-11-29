<?php
    require_once('db.php');
    if($_SERVER['REQUEST_METHOD']==='POST'){
        if(isset($_POST['name']) && isset($_POST['price']) && isset($_POST['amount']) && isset($_POST['country_id'])){
            addItem($_POST['name'],$_POST['price'],$_POST['amount'], $_POST['country_id'], $_POST['details']);
        }
    }
    header('Location:index.php');
?>