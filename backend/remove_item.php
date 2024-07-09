<?php
session_start();
if(!$_SESSION['user_id']){
    header("Location: ../frontend/login_view.php");
}

include '../db/connection.php';

    $service_id = $_REQUEST['service_id'];
    $conn = connection();

    $sql = oci_parse($conn,"delete from services where id = :id");
    oci_bind_by_name($sql, ':id', $service_id);
    
    oci_execute($sql);
    
    oci_close($conn);

    

    header("Location: ../frontend/add_item_view.php?");



                        
?>
