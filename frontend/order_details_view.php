<?php
session_start();
if(!$_SESSION['user_id']){
    header("Location: ../frontend/login_view.php");
}

include '../backend/order_details.php';

if(!isset($_REQUEST['order_id'])){
    header("Location: ../frontend/delivery_man_view.php");
}

?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
</center>
            <center>
                <h2>Order Details</h2><br>
                <table border="1px solid black" width="70%">
                    <tr>
                        <th style="background-color:antiquewhite;">Service Name</th>
                        <th style="background-color:antiquewhite;">Unit Price</th>
                        
                          
                    </tr>
                   
                    <?php
                       $details_data = get_order_details_data($_REQUEST['order_id']);
                       

                        while (($user_cart = oci_fetch_array($details_data,OCI_ASSOC)) != false) {
                        
                          
                            echo "<tr>";
                            
                            echo "<td style='background-color:Lavender;'>";
                            echo $user_cart['SERVICE_NAME'];
                            echo "</td>";

                            echo "<td style='background-color:Lavender;'>";
                            echo $user_cart['UNIT_PRICE'];
                            echo "</td>";

                        

                            echo "</tr>";
                            
                        
                        }

                    ?>
                </table>
                


                <br><br>
                <button><a href="../backend/shipped_order.php?order_id=<?php echo $_REQUEST['order_id']?>">Ship Order</a></button>
                </center>

               





</body>
</html>