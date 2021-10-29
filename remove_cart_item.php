<?php
    session_start();
    $id = $_GET['id'];
    if(isset($_SESSION['cart'])) {
        unset($_SESSION['cart'][$id]);
        echo '<script>window.history.go(-1);</script>';
        
}
?>