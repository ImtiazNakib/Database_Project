<?php

include '../db/connection.php';

function get_order_data(){

    $conn = connection();

    $sql = oci_parse($conn,"select orders.id,GRAND_TOTAL,name,phone_no,address from orders INNER JOIN users on orders.user_id = users.id
    where orders.status = 'initiated' and DELIVERED_BY_ID IS NULL");
    
    oci_execute($sql);
    
    oci_close($conn);

    return $sql;


}


                        
?>