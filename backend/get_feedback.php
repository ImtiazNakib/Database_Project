<?php

include '../db/connection.php';

function get_feedback_data(){

    $conn = connection();

    $sql = oci_parse($conn,"select feedback from feedback");
    
    oci_execute($sql);
    
    oci_close($conn);

    return $sql;


}
                        
?>
