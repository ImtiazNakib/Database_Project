<?php
session_start();
if(!$_SESSION['user_id']){
    header("Location: ../frontend/login_view.php");
}

include '../db/connection.php';

    $order_details_id = $_REQUEST['order_details_id'];
    $conn = connection();

    $sql = oci_parse($conn,"delete from order_details where id = :id");
    oci_bind_by_name($sql, ':id', $order_details_id);
    
    oci_execute($sql);
    
    oci_close($conn);

    

    header("Location: ../frontend/checkout_view.php?");



                        
?>

