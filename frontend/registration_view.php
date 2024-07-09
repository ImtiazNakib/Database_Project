<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./registration_style.css" type="text/css">
</head>
<body background="images/rbg5.svg">

<div class="registration-form">
        <h2>Registration Form</h2><br><br>
        
        <form id="registor" method="post" action = "../backend/registration.php">
            
        <table>
            <tr>
            <th>
            <!--COlumn 1-->
            <p>Name : </p>
            <input type="text" name="name" id="name" >
            <span style="color: red;">
            <?php
            $name_error = isset($_REQUEST['name_error']) ? $_REQUEST['name_error'] : null;
            if ($name_error){
                    echo $name_error."<br>";
                }
            ?>
            </span><br>

            <p>Email : </p>
            <input type="email" name="email" id="email" >
            <span style="color: red;">
            <?php
            $mail_error = isset($_REQUEST['mail_error']) ? $_REQUEST['mail_error'] : null;
            if ($mail_error){
                    echo $mail_error."<br>";
                }
            ?>
            </span><br>


            <p>Phone No : </p>
            <input type="text" name="mobno" id="mobno" >
            <span style="color: red;">
            <?php
            $mobno_error = isset($_REQUEST['mobno_error']) ? $_REQUEST['mobno_error'] : null;
            if ($mobno_error){
                    echo $mobno_error."<br>";
                }
            ?>
            </span><br>

            <p>NID : </p>
            <input type="text" name="nid" id="nid" >
            <span style="color: red;">
            <?php
            $nid_error = isset($_REQUEST['nid_error']) ? $_REQUEST['nid_error'] : null;
            if ($nid_error){
                    echo $nid_error."<br>";
                }
            ?>
            </span>

            <p>Address : </p>
            <input type="text" name="address" id="address" >
            <br>
            </th>
            

            <!--COlumn 1-->
            <th>
            <p>Password : </p>
            <input type="text" name="password" id="password">
            <span style="color: red;">
            <?php
            $password_error = isset($_REQUEST['password_error']) ? $_REQUEST['password_error'] : null;
            if ($password_error){
                    echo $password_error."<br>";
                }
            ?>
            </span><br>

            <p>Retype the Password : </p>
            <input type="text" name="repassword" id="repassword">
            <span style="color: red;">
            <?php
            $repassword_error = isset($_REQUEST['repassword_error']) ? $_REQUEST['repassword_error'] : null;
            if ($repassword_error){
                    echo $repassword_error."<br>";
                }
            ?>
            </span><br>



            <label>User type</label>
            <select name="user_type" id="user_type">
                <option value="admin">Admin</option>
                <option value="customer">customer</option>
                <option value="service_man">Service man</option>
            </select>
            <br><br><br><br><br><br><br><br><br>


            <input type="submit" value="Confirm Registration" style="background-color:chartreuse;"><br><br><br>
            <button style="background-color:yellow;"><a href = "./login_view.php">Login </a></button>
                </th>
            </tr>
        </table>      
            

        </form>
</div>

</body>
</html>