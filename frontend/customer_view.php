<?php
session_start();
include '../backend/customer.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./customer.css" type="text/css">
</head>
<body>
    <bodY background="images/admin.jpg">
        <div class = "customer">
            <center><h1 style="font-size: 40px; font-family:serif; color:brown">Our Services</h1></center><br><br>
        <center>      
        <form method="POST" action="./customer_view.php">
            <label for="gsearch" style="font-weight:bold">Search Service: </label>
            <input type="search" id="search_servie_name" name="search_servie_name">
            <input type="submit" name="search_servie" style="background-color:cornflowerblue;"><br><br>
            </form>

            <label for="price_order" style="font-weight:bold;">Sort Service by price:</label>
            <select name="price_order" id="price_order">
                <option value="volvo" style="background-color: red;">Ascending</option>
                <option value="saab" style="background-color: green;">Descending</option>
            </select>
            <br><br>




        </center>
            <center>
                <table border="1px solid black" width="70%">
                    <tr>
                        <th style="background-color:antiquewhite;">Service Type
                        <img src="../frontend/images/service01.jpg" width="20" height="20"></th>

                        <th style="background-color:antiquewhite;">Service Name
                        <img src="../frontend/images/service02.jpg" width="20" height="20"></th>

                        <th style="background-color:antiquewhite;">Description
                        <img src="../frontend/images/description.jpg" width="20" height="20"></th>

                        <th style="background-color:antiquewhite;">Unit Price 
                        <img src="../frontend/images/taka.jpg" width="20" height="20"></th>

                        <th style="background-color:antiquewhite;">Cart</th>    
                    </tr>
                   
                    <?php
                        $search_servie_name = isset($_POST['search_servie_name']) ? $_POST['search_servie_name'] : null;
                        $services = get_service_data($search_servie_name);

                        while (($service = oci_fetch_array($services,OCI_ASSOC)) != false) {
                        
                            echo "<tr>";
                            
                            echo "<td style='background-color:Lavender;'>";
                            echo $service['SERVICE_TYPE'];
                            echo "</td>";

                            echo "<td style='background-color:Lavender;'>";
                            echo $service['SERVICE_NAME'];
                            echo "</td>";

                            echo "<td style='background-color:Lavender;'>";
                            echo $service['DESCRIPTION'];
                            echo "</td>";

                            echo "<td style='background-color:Lavender;'>";
                            echo $service['UNIT_PRICE'];
                          
                            echo "</td>";

                            echo "<td style='background-color:Lavender;'>";
                            
                            echo '<a href="../backend/cart.php?service_id='.$service["ID"].'"><img src="../frontend/images/cart1.jpg" width="35" height="20" href="../backend/cart.php"></a>';
                            echo "</td>";
                           


                            echo "</tr>";
                            
                        
                        }

                    ?>
                </table>
                </center>

           
        </div>
    </bodY>
    <br><br>

    
    <button class="check_out_button" onclick="location.href='../frontend/checkout_view.php'">Check Out</button>
    
    

    <div class="img">
    <a href="../frontend/agents_view.php"><img src="../frontend/images/customer_care.jpg.png" width="100" height="80"></a>
       
        &NonBreakingSpace;&NonBreakingSpace;&NonBreakingSpace;&NonBreakingSpace;
        &NonBreakingSpace;&NonBreakingSpace;&NonBreakingSpace;&NonBreakingSpace;
        &NonBreakingSpace;&NonBreakingSpace;&NonBreakingSpace;&NonBreakingSpace;
        <a href="../frontend/feedback_view.php"> <img src="../frontend/images/comment.png" width="100" height="80"></a>
      
    </div>
    <br><br><button class="logout_button" onclick="location.href='../backend/logout.php'">Log Out</button>
</body>
</html>
