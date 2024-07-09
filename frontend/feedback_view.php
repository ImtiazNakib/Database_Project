<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../frontend/customer.css" type="text/css">
</head>
<body background="images/f1.jpg">

<center><h2>Give us your feedback to improve our Services</h2><br>

<form form id="feedback" method="post" action = "../backend/feedback.php">
            <div class='feedback'>
            <p>Type your feedback here : </p>
            <textarea name="feedback" id="feedback" rows="10" cols="50" ></textarea>
            <span style="color: red;">
            
            </span><br>
            <input type="submit" value="Give Feedback" style="background-color:darkkhaki">
            </div>

</form></center>


</body>
</html>