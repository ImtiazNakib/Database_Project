<?php

if(!$_SESSION['user_id']){
    header("Location: ../frontend/login_view.php");
}

include '../db/connection.php';

function get_user_cart_data(){

    $conn = connection();

    $sql = oci_parse($conn,"select service_name,unit_price,order_details.id,orders.id as order_id from order_details INNER JOIN services on order_details.service_id = services.id INNER JOIN
    orders on orders.id = order_details.order_id where orders.user_id = :user_id");

   

    oci_bind_by_name($sql, ':user_id', $_SESSION['user_id']);
    
    oci_execute($sql);

    
    oci_close($conn);

    return $sql;

    


}
                        
?>