<?php
include '../backend/agents.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body background="images/a2.jpg">
    <center>
        <h2>Here are our agents number</h2><br>
                <table border="1px solid black" width="70%">
                    <tr>
                        <th style="background-color:antiquewhite;">Area</th>

                        <th style="background-color:antiquewhite;">Agent Name
                        <center><img src="../frontend/images/team.jpg" width="20" height="20"></center></th>  </th>

                        <th style="background-color:antiquewhite;">Phone Number
                        <center><img src="../frontend/images/call.jpg" width="20" height="20"></center></th>  </th>
                         
                    </tr>

                    <?php
                        
                        $agents = get_agent_data();

                        while (($agent = oci_fetch_array($agents, OCI_ASSOC)) != false) {
                        
                            echo "<tr>";
                            echo "<td>";
                            echo $agent['AREA'];
                            echo "</td>";

                            echo "<td>";
                            echo $agent['AGENT_NAME'];
                            echo "</td>";

                            echo "<td>";
                            echo $agent['PHONE_NO'];
                            echo "</td>";

                        }
                    
                    ?>


                </table></center>
</body>
</html>