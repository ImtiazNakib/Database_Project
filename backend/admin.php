<?php

include '../db/connection.php';

function get_user_data(){

    $conn = connection();

    $sql = oci_parse($conn,"select * from users");
    
    oci_execute($sql);
    
    oci_close($conn);

    return $sql;


}
                        
?>