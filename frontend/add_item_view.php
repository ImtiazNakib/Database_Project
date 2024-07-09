<?php
session_start();
include '../backend/add_item.php';
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./add_item.css" type="text/css">
</head>
<body background="images/rbg2.jpg">

      <div class = "services-table"> 
             
                <center><u><h2>Service Data</h2></u></center>
                <center><table border="1px solid black width=70%">
                    <tr>
                        <th style="background-color:navajowhite;">Service Type</th>
                        <th style="background-color:navajowhite;">Service Name</th>
                        <th style="background-color:navajowhite;">Description</th>
                        <th style="background-color:navajowhite;">Unit Parice</th>
                        <th style="background-color:navajowhite;">Delete Product</th>
                        
                    </tr>

                    <?php
                        
                        $services = get_service_data();

                        while (($service = oci_fetch_array($services, OCI_ASSOC)) != false) {
                        
                            echo "<tr>";
                            echo "<td>";
                            echo $service['SERVICE_TYPE'];
                            echo "</td>";

                            echo "<td>";
                            echo $service['SERVICE_NAME'];
                            echo "</td>";

                            echo "<td>";
                            echo $service['DESCRIPTION'];
                            echo "</td>";

                            echo "<td>";
                            echo $service['UNIT_PRICE'];
                            echo "</td>";

                            echo "<td style='background-color:Lavender;'>";
                            echo '<a href="../backend/remove_item.php?service_id='.$service['ID'].'"><img src="../frontend/images/cross1.jpg" width="20" height="20"></a>';
                            echo "</td>";
  
                        
                        }
                    
                    ?>
                </table></cente> 
            
        </div>





<center><form method='POST' action="../backend/add_item.php?add_item=true">

<br><br><label>Service type: </label><br><br>
            <select name="service_type" id="service_type">
                <option value="Home Service">Home Service</option>
                <option value="Electric Service">Electric Service</option>
                <option value="Laundry">Laundry Service</option>
                <option value="Grocery">Grocery</option>
            </select>


            <p>Item Name : </p>
            <input type="text" name="service_name" id="item_name" >
            <span style="color: red;">
            <?php
            $name_error = isset($_REQUEST['name_error']) ? $_REQUEST['name_error'] : null;
            if ($name_error){
                    echo "<br>".$name_error;
                }
            ?>
            </span><br>
           
            <p>Item Description : </p>
            <input type="text" name="description" id="item_description" >
           
            
            <p>Item Price : </p>
            <input type="text" name="unit_price" id="price" >
            <span style="color: red;">
            <?php
            $price_error = isset($_REQUEST['price_error']) ? $_REQUEST['price_error'] : null;
            if ($price_error){
                    echo "<br>".$price_error."<br>";
                }
            ?>
            </span><br>

           
            
            
            
            <br><br><input type="submit" value="Add Item" style="background-color:yellow;">
        
</form></center>

    
</body>
</html>