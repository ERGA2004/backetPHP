<?php
require_once 'db.php';
    if($_SERVER['REQUEST_METHOD']==='POST'){
        if(isset($_POST['name']) && isset($_POST['lastname']) && isset($_POST['login']) && isset($_POST['password'])){
            if($_POST['password'] === $_POST['confirm_password']){
                if(addUser($_POST['name'], $_POST['lastname'], $_POST['login'], md5($_POST['password']))){
                    header('location:login.php');
                }else header('location:registration.php?error');
                
            }else header('location:registration.php?error_password');
        }
    }
?>