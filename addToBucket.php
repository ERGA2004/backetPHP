<?php 
	if($_SERVER['REQUEST_METHOD'] === "POST"){
		require_once 'db.php';
		if(isset($_SESSION['user_id'])){
			if($_POST['amount'] > 0){
				if(addToBucket($_POST['item_id'], $_SESSION['user_id'], $_POST['amount'])){
					header('Location:itemInformation.php?id='.$_POST['item_id'].'&addedToBucket');
				} else header("Location:itemInformation.php?id=".$_POST['item_id']."&amount_err");
			}
		} else header('Location:login.php');
	}
?>