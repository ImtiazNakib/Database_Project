<?php
include '../db/connection.php';


$feedback = $_POST['feedback'];

if(!isset($feedback)){
    header("Location: ../frontend/customer_view.php");
}

$conn = connection();

$sql = oci_parse($conn,"INSERT INTO feedback(feedback) VALUES
(:feedback)");


oci_bind_by_name($sql, ':feedback', $feedback);


oci_execute($sql);


oci_close($conn);


header("Location: ../frontend/customer_view.php");


?>