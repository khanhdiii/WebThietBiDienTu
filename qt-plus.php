<?php session_start();
    $id = $_GET['key'];
    $_SESSION['cart'][$id]['qty'] +=1;
    echo '<script>window.history.go(-1);</script>';
?>