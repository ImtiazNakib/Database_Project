<?php
include '../db/connection.php';

if ($_GET['id'] && $_GET['action']) {
    $conn = connection();

    $sql = oci_parse($conn, "UPDATE users set status=:st where id=:u_id");



    oci_bind_by_name($sql, ':st', $_GET['action']);
    oci_bind_by_name($sql, ':u_id', $_GET['id']);

    oci_execute($sql);
    oci_close($conn);

    header("Location: ../frontend/admin_view.php");
}
