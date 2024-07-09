<?php
session_start();
include '../db/connection.php';

$email = $_POST['loginMail'];
$password = $_POST['loginPass'];



$conn = connection();
$sql = oci_parse($conn,"select * from users where email = :em and password = :pass and status = 'approved'");
oci_bind_by_name($sql, ':em', $email);
oci_bind_by_name($sql, ':pass', $password);

oci_execute($sql);

 
$count = 1;

    while (($row = oci_fetch_array($sql, OCI_ASSOC)) != false) {
        echo "welcome! ";
        echo $row['NAME'] ."<br>\n";
        $count = 0;
        $_SESSION['user_id'] = $row['ID'];
        $_SESSION['user_name'] = $row['NAME'];
        if($row['USER_TYPE'] == 'customer'){
            header("Location: ../frontend/customer_view.php"); 
        }
        else if($row['USER_TYPE'] == 'admin'){
            header("Location: ../frontend/admin_view.php"); 
        }
        else{
            header("Location: ../frontend/delivery_man_view.php"); 
        }
    }


if($count){
    echo "Invalid id or password";
}

oci_close($conn);

?>