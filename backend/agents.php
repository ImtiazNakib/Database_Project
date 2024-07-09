<?php

include '../db/connection.php';

function get_agent_data(){

    $conn = connection();

    $sql = oci_parse($conn,"select * from agent_numbers");
    
    oci_execute($sql);
    
    oci_close($conn);

    return $sql;

    


}
                        
?>