<?php
include '../db/connection.php';
function get_order_details_data($order_id){

    $conn = connection();

    $sql = oci_parse($conn,"select service_name,unit_price from order_details INNER JOIN services on order_details.service_id = services.id INNER JOIN
    orders on orders.id = order_details.order_id where orders.id = :id");
    oci_bind_by_name($sql, ':id',$order_id);
    
    oci_execute($sql);
    
    oci_close($conn);

    return $sql;


}
?>