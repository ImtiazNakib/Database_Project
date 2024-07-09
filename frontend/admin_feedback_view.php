<?php
include "../backend/get_feedback.php";

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body background="./images/feedbackbg01.jpg"><center>
    <h1>Our feedbacks<h2>
    
                <table border="1px solid black" width="70%">
                    <tr>
                        <th style="background-color:skyblue;">Feedbacks</th>

   
                    </tr>
                   
                 <?php
                       
                        $feedbacks = get_feedback_data();
                      
                        
                        while (($feedback = oci_fetch_array($feedbacks,OCI_ASSOC)) != false) {
                           
                            echo "<tr>";
                            
                            echo "<td style='background-color:Lavender;'>";
                            echo $feedback['FEEDBACK'];
                            echo "</td>";

                            echo "</tr>";   
                        
                        }

                    ?>
                </table>
                </center>
</body>
</html>