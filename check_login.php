<?php
    session_start();
    $item = $_SESSION['cart'];
    if(!isset($_SESSION['cart']) || count($item) < 1 ){
        echo '<script>alert("Giỏ hàng đang trống");window.history.go(-1);</script>';
    }elseif(isset($_SESSION['username'])){
            header('Location: Purchase.php');}
    else{
        header('Location: signin.php');
    }

?>