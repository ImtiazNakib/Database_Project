<?php
session_start();
include '../backend/admin.php';
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

    <bodY background="images/admin.jpg">
        <div class = admin>
            <center><u><h1 style="font-size: 40px;">Admin Panel</h1></u></center>
            <form id="admin" method="post" action="./admin.php">
                <center><h2>User Data</h2></center>
                <center><table border="1px solid black width=70%">
                    <tr>
                        <th style="background-color:navajowhite;">User Type</th>
                        <th style="background-color:navajowhite;">Email</th>
                        <th style="background-color:navajowhite;">Name</th>
                        <th style="background-color:navajowhite;">Phone Number</th>
                        <th style="background-color:navajowhite;">NID</th>
                        <th style="background-color:navajowhite;">Address</th>
                        <th style="background-color:navajowhite;">Status</th>
                        <th style="background-color:navajowhite;">Actions</th>
                        
                    </tr>

                    <?php
                        
                        $users = get_user_data();

                        while (($user = oci_fetch_array($users, OCI_ASSOC)) != false) {
                        
                            echo "<tr>";
                            echo "<td>";
                            echo $user['USER_TYPE'];
                            echo "</td>";

                            echo "<td>";
                            echo $user['EMAIL'];
                            echo "</td>";

                            echo "<td>";
                            echo $user['NAME'];
                            echo "</td>";

                            echo "<td>";
                            echo $user['PHONE_NO'];
                            echo "</td>";

                            echo "<td>";
                            echo $user['NID'];
                            echo "</td>";

                            echo "<td>";
                            echo $user['ADDRESS'];
                            echo "</td>";


                            echo "<td>";
                            echo $user['STATUS'];
                            echo "</td>";

                            
                            echo "<td>";
                            if($user['STATUS'] == 'blocked'){
                                echo "<a href='../backend/user_approve.php?id=".$user['ID']."&action=approved'>Active User</a>";
                            }
                            else{
                                echo "<a href='../backend/user_approve.php?id=".$user['ID']."&action=blocked'>Block User</a>";
                            }
                            echo "</td>";
                            echo "</tr>";
                        }
                    
                    ?>
                </table></cente> 
            </form>
        </div>
    </bodY>
    <br><center>
    <a href="../frontend/add_item_view.php"><img src="../frontend/images/add.png" width="100" height="80"></a>
    &NonBreakingSpace;&NonBreakingSpace;&NonBreakingSpace;&NonBreakingSpace;
        &NonBreakingSpace;&NonBreakingSpace;&NonBreakingSpace;&NonBreakingSpace;
        &NonBreakingSpace;&NonBreakingSpace;&NonBreakingSpace;&NonBreakingSpace;
    <a href="../frontend/backup_item_view.php"><img src="../frontend/images/backup.png" width="100" height="80"></a>
    
    &NonBreakingSpace;&NonBreakingSpace;&NonBreakingSpace;&NonBreakingSpace;
        &NonBreakingSpace;&NonBreakingSpace;&NonBreakingSpace;&NonBreakingSpace;
        &NonBreakingSpace;&NonBreakingSpace;&NonBreakingSpace;&NonBreakingSpace;
    <a href="../frontend/admin_feedback_view.php"> <img src="../frontend/images/feedbacks.png" width="100" height="80"></a>
   
    
    </center>

    <br><br>
    <button class="logout_button" onclick="location.href='../backend/logout.php'">Log Out</button>
    
</body>
</html>
