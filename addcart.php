<?php
session_start();
$id = $_GET['item'];

if(isset($_SESSION['cart'])){
    if(isset($_SESSION['cart'][$id])){
        $_SESSION['cart'][$id]['qty'] += 1;
    }else{
        $_SESSION['cart'][$id]['qty'] = 1;
    }
        echo '<script>window.history.go(-1);</script>';
}else{
    $_SESSION['cart'][$id]['qty'] = 1;
    echo '<script>window.history.go(-1);</script>';
}

?>


