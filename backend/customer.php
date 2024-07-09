<?php

include '../db/connection.php';

function get_service_data($search_servie_name){

    $query = "select * from services";

    if ($search_servie_name){
        $query = "select * from services where service_name like '%".$search_servie_name."%'";
    }
    
    $conn = connection();

    $sql = oci_parse($conn,$query);
    
    oci_execute($sql);
    
    oci_close($conn);

    return $sql;


}
                        
?>