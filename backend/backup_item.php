<?php

include '../db/connection.php';

function get_backup_data(){

    $conn = connection();

    $sql = oci_parse($conn,"select * from backup_table");
    
    oci_execute($sql);
    
    oci_close($conn);

    return $sql;


}
                        
?>