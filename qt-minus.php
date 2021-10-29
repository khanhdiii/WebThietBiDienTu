<?php session_start();
    $id = $_GET['key'];
    if($_SESSION['cart'][$id]['qty'] >1){
        $_SESSION['cart'][$id]['qty'] -=1 ;
        echo '<script>window.history.go(-1);</script>';
    }else{
        echo '<script>window.history.go(-1);</script>';
    }
    
?>