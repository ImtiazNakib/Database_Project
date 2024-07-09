<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./login.css" type="text/css">
</head>
<body>
    
    <body background="images/lbg1.jpg"><center>
        <h1 style="font-size:40px;">Welcome to Home Service System</h1><br><br>
        <div style="border: 3px solid black; width:30%;">
            <form id="login" method="post" action = "../backend/login.php">
            <h2>Login into the System</h2>
            <label>Email id </label>
            <input type="text" name="loginMail" id="name" placeholder="Enter your email"><br><br>

            <label>Password </label>
            <input type="text" name="loginPass" id="name" placeholder="Enter your password"><br><br>

            <input type="submit" value="Login" style="background-color:chartreuse;">
            <button style="background-color:darkkhaki;"><a href = "./registration_view.php">Don't have any Account?</a></button>
            <br><br><br>
        </form>
        </div>
    </center></body>
</body>
</html>