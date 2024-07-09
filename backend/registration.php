<?php
include '../db/connection.php';
$error = [];
/////////////
if(empty($_POST['name'])){
    $error['name_error'] = 'Please enter your name';

}
////////////
if(empty($_POST['email'])){
    $error['email_error'] = 'Please enter your email';
}
////////////
if(empty($_POST['mobno'])){
    $error['mobno_error'] = 'Please enter your phone number';
}
else if(!preg_match("/01/",$_POST['mobno'])){
    $error['mobno_error'] = 'Mobile number should start with 01';
}
else if(strlen($_POST['mobno']) != 11){
    
    $error['mobno_error'] = 'Mobile number should be in 11 digit';
}
////////////
if(strlen($_POST['nid']) != 13){
    $error['nid_error'] = 'NID should be in 13 digit';
}
/////////////
if(empty($_POST['password'])){
    $error['password_error'] = 'Please enter your password';
}

else if (!preg_match("/^[a-zA-Z0-9]/",$_POST['password'])) {
    $error['password_error'] = 'Please enter valid password';
  }
////////////
if(empty($_POST['repassword'])){
    $error['repassword_error'] = 'Please enter your password again';
}
else if ($_POST['password'] != $_POST['repassword']) {
    $error['repassword_error'] = 'Password not matching';
  }
  

//http_build_query make associative array to url query param. Helps to find out the error
//header == Send data from one file to another.(Backend to Frontend)
if(!empty($error)){
    header("Location: ../frontend/registration_view.php?".http_build_query($error));
}


$user_type = $_POST['user_type'];
$name = $_POST['name'];
$email = $_POST['email'];
$mobno = $_POST['mobno'];
$nid = $_POST['nid'];
$address = $_POST['address'];
$password = $_POST['password'];
$repassword = $_POST['repassword'];



$conn = connection();

$sql = oci_parse($conn,"INSERT INTO users(user_type,email,name,phone_no,nid,address,password,status) VALUES
(:user_type,:email,:name,:mobno,:nid,:address,:password,'blocked')");



oci_bind_by_name($sql, ':user_type', $user_type);
oci_bind_by_name($sql, ':email', $email);
oci_bind_by_name($sql, ':name', $name);
oci_bind_by_name($sql, ':mobno', $mobno);
oci_bind_by_name($sql, ':nid', $nid);
oci_bind_by_name($sql, ':address', $address);
oci_bind_by_name($sql, ':password', $password);

oci_execute($sql);



    oci_close($conn);
    header("Location: ../frontend/login_view.php?");

?>