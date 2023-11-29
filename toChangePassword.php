<?php 
	require_once 'db.php';
	session_start();
	if($_SERVER['REQUEST_METHOD']==='POST'){
		if(isset($_POST['old_password']) && isset($_POST['password']) && isset($_POST['confirm_password'])){
			if(md5($_POST['old_password']) === $_SESSION['password']){
				if($_POST['password'] === $_POST['confirm_password']){
					changePassword(md5($_POST['password']), $_SESSION['user_id']);
					$_SESSION['password'] = md5($_POST['password']);
					header('location:profile.php?change_success');
				} else header('location:profile.php?confirm_pass_error');
			} else header('location:profile.php?old_pass_error');
		}
	}
?>