<!DOCTYPE html>
<html lang="en" dir="ltr">
    <head>
        
        <link rel="stylesheet" href="css/login.css">
        <meta charset="utf-8">
    </head>
    <body style="font-family: 'Poppins', sans-serif;">
        <form action="login2.php" method="POST" class="login-form">
    <h1>Login</h1>
    <div class="txtb">
            <input type="text" placeholder="Username" name="username">
        </div> 
        <div class="txtb">
            <input type="password" placeholder="Password" name="password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="at least one number and one uppercase and one lowercase, and atleast 8 or more characters">
        </div> 
    <br><br>
  <button type="submit" class="logbtn">Login</button><br>
       <button type="reset" class="resbtn">Reset</button>
                <br>
<?php
    if(isset($_GET['error'])==true) {
    echo '<center><font size="5" color="red"> Sorry!! username and password do not match</font></center>';}
?>

                <div style="margin-top: 30px;text-align: center">
                Go Back to Home ?  <a href="hp.html">Home</a>
                </div>
   </form></body>
</html>