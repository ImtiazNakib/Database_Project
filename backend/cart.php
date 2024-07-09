<?php
session_start();
if(!$_SESSION['user_id']){
    header("Location: ../frontend/login_view.php");
}
include '../db/connection.php';

$service_id = $_REQUEST['service_id'];




$conn = connection();

$sql = oci_parse($conn,"select * from services where id = :service_id");

oci_bind_by_name($sql, ':service_id', $service_id);


oci_execute($sql);
$service = oci_fetch_array($sql, OCI_ASSOC);
//var_dump($row); //print the whole array or print the whole data

if($service == false){
    header("Location: ../frontend/customer_view.php");
}


$sql = oci_parse($conn,"select * from orders where status='cart' and user_id=:user_id");
oci_bind_by_name($sql, ':user_id', $_SESSION['user_id']);

oci_execute($sql);
$order = oci_fetch_array($sql, OCI_ASSOC);
 
if($order == false){
    $sql = oci_parse($conn,"insert into orders(user_id,status) values (:user_id,'cart')");
    oci_bind_by_name($sql, ':user_id', $_SESSION['user_id']);

oci_execute($sql);

$sql = oci_parse($conn,"select * from orders where status='cart' and user_id=:user_id");
oci_bind_by_name($sql, ':user_id', $_SESSION['user_id']);

oci_execute($sql);
$order = oci_fetch_array($sql, OCI_ASSOC);
}




$sql = oci_parse($conn,"insert into order_details(order_id,service_id,quantity,total_price) values (:order_id,:service_id,1,:total_price)");
    oci_bind_by_name($sql, ':order_id', $order['ID']);
    oci_bind_by_name($sql, ':service_id', $service_id);
    oci_bind_by_name($sql, ':total_price', $service['UNIT_PRICE']);

oci_execute($sql);


oci_close($conn);


header("Location: ../frontend/customer_view.php?")
?>