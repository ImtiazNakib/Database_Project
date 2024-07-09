<?php
session_start();
if(!$_SESSION['user_id']){
    header("Location: ../frontend/login_view.php");
}
include '../db/connection.php';

$order_id = $_REQUEST['order_id'];


$conn = connection();

$sql = oci_parse($conn,"update orders set status='initiated' where id = :id");

oci_bind_by_name($sql, ':id', $order_id);


oci_execute($sql);


$sql = oci_parse($conn,"BEGIN totalCount(".$order_id."); END;");

oci_execute($sql);


oci_close($conn);

header("Location: ../frontend/thank_you_view.php");

?>