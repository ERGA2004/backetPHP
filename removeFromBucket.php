<?php
session_start();

if(isset($_POST['item_id'])) {
    $itemId = $_POST['item_id'];

    if(isset($_SESSION['bucket'][$itemId])) {
        unset($_SESSION['bucket'][$itemId]);
    }
}
header('Location: bucket.php');
?>
