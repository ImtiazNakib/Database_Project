<?php
include '../db/connection.php';

function get_service_data(){

    $conn = connection();

    $sql = oci_parse($conn,"select * from services");
    
    oci_execute($sql);
    
    oci_close($conn);

    return $sql;


}


if(isset($_REQUEST['add_item']) && $_REQUEST['add_item']==true){
    $error = [];
    if(empty($_POST['service_name'])){
        $error['name_error'] = 'Please enter service name';
    
    }
    ////////////
    if(empty($_POST['unit_price'])){
        $error['price_error'] = 'Please enter price';
    }

    if(!empty($error)){
        header("Location: ../frontend/add_item_view.php?".http_build_query($error));
    }


    $service_type = $_POST['service_type'];
    $service_name = $_POST['service_name'];
    $description = $_POST['description'];
    $unit_price = $_POST['unit_price'];
    
    $conn = connection();
    
    $sql = oci_parse($conn,"INSERT INTO services(service_type,service_name,description,unit_price) VALUES
    (:service_type,:service_name,:description,:unit_price)");

    oci_bind_by_name($sql, ':service_type', $service_type);
    oci_bind_by_name($sql, ':service_name', $service_name);
    oci_bind_by_name($sql, ':description', $description);
    oci_bind_by_name($sql, ':unit_price', $unit_price);

    oci_execute($sql);
    oci_close($conn);
    
    header("Location: ../frontend/add_item_view.php");
   

}





?>