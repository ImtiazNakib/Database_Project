<?php
session_start();
if(!$_SESSION['user_id']){
    header("Location: ../frontend/login_view.php");
}
include '../backend/delivery_man.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./delivery_man.css" type="text/css">
</head>
<body>

    <bodY background="images/admin.jpg">
        <div class = admin>
            <center><u><h1 style="font-size: 40px;">Orders</h1></u></center>
            <form>
                
                <table border="1px solid black width=70%">
                    <tr>
                        <th style="background-color:navajowhite;">Customer Name</th>
                        <th style="background-color:navajowhite;">Customer Phone No</th>
                        <th style="background-color:navajowhite;">Customer Address</th>
                        <th style="background-color:navajowhite;">Grand Total</th>
                        <th style="background-color:navajowhite;">View Order Details</th>
                        
                        
                    </tr>

                    <?php
                        
                        $orders = get_order_data();
                        

                        while (($order = oci_fetch_array($orders, OCI_ASSOC)) != false) {
                        
                            
                            echo "<tr>";
                            echo "<td>";
                            echo $order['NAME'];
                            echo "</td>";

                            echo "<td>";
                            echo $order['PHONE_NO'];
                            echo "</td>";

                            echo "<td>";
                            echo $order['ADDRESS'];
                            echo "</td>";

                            echo "<td>";
                            echo $order['GRAND_TOTAL'];
                            echo "</td>";

                            echo "<td>";
                            echo '<a href = "./order_details_view.php?order_id='.$order['ID'].'">Details</a>';
                            echo "</td>";

                            echo "</tr>";
                        }
                    
                    ?>


                </table>
                   
            </form>
        </div>
    </bodY>
    <br><br>
    <button class="logout_button" onclick="location.href='../backend/logout.php'">Log Out</button>
</body>
</html>
