<?php

include '../db/connection.php';



    $conn = connection();

    $sql = oci_parse($conn,"BEGIN totalCount(41); END;");
    
    oci_execute($sql);
    
    oci_close($conn);

    return $sql;



                        
?>