<?php

session_start();
if(!isset($_SESSION['user_id'])){
    header("Location: ../frontend/login_view.php");
}
var_dump($_SESSION['user_id']);

include '../db/connection.php';

$order_id = $_REQUEST['order_id'];


$conn = connection();

$sql = oci_parse($conn,"update orders set status='shipped', delivered_by_id=:delivery_man_id where id = :id");

oci_bind_by_name($sql, ':id', $order_id);
oci_bind_by_name($sql, ':delivery_man_id', $_SESSION['user-id']);


oci_execute($sql);

oci_close($conn);

header("Location: ../frontend/delivery_man_view.php");



                        
?>

