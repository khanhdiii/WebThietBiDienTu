<?php 
    include "connect.php";
    $id_order = filter_input(INPUT_GET, 'id');
    $status = filter_input(INPUT_GET, 'status');
    $sql_update = "UPDATE orders SET Status = '$status' WHERE Id_orders = '$id_order'";
    $result_update = mysqli_query($connect, $sql_update);
    if($result_update){
        echo '<script>location.href = "javascript: history.go(-1)";</script>';
    }
?>