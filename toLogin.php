<?php
require_once 'db.php';
    if($_SERVER['REQUEST_METHOD']==='POST'){
        if(isset($_POST['login']) && isset($_POST['password'])){
            $user = checkUser($_POST['login'], md5($_POST['password']));
            if($user!=null){
                session_start();
                $_SESSION['user_id'] = $user['id'];
                $_SESSION['name'] = $user['name'];
                $_SESSION['lastname'] = $user['lastname'];
                $_SESSION['login'] = $user['login'];
                $_SESSION['password'] = $user['password'];
                $_SESSION['role'] = $user['role'];
                header('Location:index.php?login_success');
            }else header('Location:login.php?login_fail');
        }
    }
?>