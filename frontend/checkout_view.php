<?php
session_start();
if(!$_SESSION['user_id']){
    header("Location: ../frontend/login_view.php");
}

include '../backend/checkout.php';


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../customer.css" type="text/css">
</head>
<body>
</center>
            <center>
                <h2>Your Orders</h2><br>
                <table border="1px solid black" width="70%">
                    <tr>
                        <th style="background-color:antiquewhite;">Service Name</th>
                        <th style="background-color:antiquewhite;">Unit Price</th>
                        <th style="background-color:antiquewhite;">Actions</th>
                          
                    </tr>
                   
                    <?php
                       $user_cart_data = get_user_cart_data();
                       

                        while (($user_cart = oci_fetch_array($user_cart_data,OCI_ASSOC)) != false) {
                        
                            $order_id = $user_cart['ORDER_ID'];
                            echo "<tr>";
                            
                            echo "<td style='background-color:Lavender;'>";
                            echo $user_cart['SERVICE_NAME'];
                            echo "</td>";

                            echo "<td style='background-color:Lavender;'>";
                            echo $user_cart['UNIT_PRICE'];
                            echo "</td>";

                            echo "<td style='background-color:Lavender;'>";
                            echo '<a href="../backend/cancel_item.php?order_details_id='.$user_cart['ID'].'"><img src="../frontend/images/cross1.jpg" width="20" height="20"></a>';
                            echo "</td>";

                        

                            echo "</tr>";
                            
                        
                        }

                    ?>
                </table>

                </center>
               
                <br><button class="confirm_button"><a href='../backend/confirm.php?order_id=<?php echo $order_id ?>'>Confirm Order</a></button>
               
</body>
</html>