<?php
session_start();
include '../backend/backup_item.php';
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
             
                <center><u><h2>Service backup Data</h2></u></center>
                <center><table border="1px solid black width=70%">
                    <tr>
                        <th style="background-color:navajowhite;">Service Type</th>
                        <th style="background-color:navajowhite;">Service Name</th>
                        <th style="background-color:navajowhite;">Description</th>
                        <th style="background-color:navajowhite;">Unit Parice</th>
                        
                    </tr>

                    <?php
                        
                        $services = get_backup_data();

                        while (($user = oci_fetch_array($services, OCI_ASSOC)) != false) {
                        
                            echo "<tr>";
                            echo "<td>";
                            echo $user['SERVICE_TYPE'];
                            echo "</td>";

                            echo "<td>";
                            echo $user['SERVICE_NAME'];
                            echo "</td>";

                            echo "<td>";
                            echo $user['DESCRIPTION'];
                            echo "</td>";

                            echo "<td>";
                            echo $user['UNIT_PRICE'];
                            echo "</td>";
  
                        
                        }
                    
                    ?>
                </table></cente> 
            
        </div>


        
    
</body>
</html>