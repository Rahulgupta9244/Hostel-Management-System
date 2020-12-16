<?php
include_once('db.php');
if(isset($_POST['name']))
    $s_id = $_POST['name'];
 $res = mysqli_query($conn,"SELECT room_id FROM room");
?>
<!doctype html>
<html><head>
    <link href="https://fonts.googleapis.com/css?family=Poppins&display=swap" rel="stylesheet">
      <link rel="stylesheet" href="css/rdel.css">
    <style> .tag{ margin-top: 150px;}</style>
    </head>
<body>
    <form action="r1delete.php" method="POST">
<div class="tag"> <center> <h1 style="font-family: 'Poppins', sans-serif;">Delete Room Details<br><br></h1>  
 Enter Room ID: &nbsp;&nbsp;&nbsp;<input type="text" name="name"><br><br><br>
 <button type="submit" name="submit"><b>DELETE</b></button>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
     <button type="reset">RESET</button>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

   <a href="admin.html"> <button type="button">BACK</button></a> </center></div>
    </form>
    <div>
        <form action="admin.php" class="container2">
            <a href="sadd.html"> <button id="b6" name="add" type="button">Add Student</button></a> <br><br>
            <a href="radd.html"> <button id="b6" name="add" type="button">Add Room</button></a> <br><br>
        <a href="vadd.html"> <button id="b6" name="add" type="button">Add Visitor</button></a> <br><br>
        <a href="hadd.html"> <button id="b6" name="add" type="button">Add Hostel</button></a> <br><br>
                <a href="fadd.html"> <button id="b6" name="add" type="button">Add Fee Details</button></a> <br><br>
                 <button id="b6" name="add" type="button" onclick="window.location.href='sdelete.php'">Delete Student</button> <br><br>
        <button id="b6" name="add" type="button" onclick="window.location.href='rdelete.php'">Delete Room </button> <br><br>
         <button id="b6" name="add" type="button" onclick="window.location.href='hdelete.php'">Delete Hostel</button> <br><br>
        <button id="b6" name="add" type="button" onclick="window.location.href='vdelete.php'">Delete Visitor</button> <br><br>

</form>
        </div>
    <div>
        <form action="admin.php" class="container">
   
   <button type="button" id="b5" name="adminview" onclick="window.location.href='view_students.php'">View Students</button><br> <br>
        <button type="button" id="b7" name="update2" onclick="window.location.href='view_visitor.php'">View Visitor Details</button><br><br>
         <button type="button" id="b7" name="update3" onclick="window.location.href='view_mesh.php'">View Mess Details</button> <br><br>
        <button type="button" id="b8" name="fee" onclick="window.location.href='view_fees.php'">View Fee Details</button><br><br>
       <button id="b8" name="room" type="button" onclick="window.location.href='view_room.php'">View Room Details</button><br><br>
                <button id="b8" name="vhd" type="button" onclick="window.location.href='view_hostel.php'">View Hostel Details</button><br><br>
    <button id="b6" name="add" type="button" onclick="window.location.href='mupdate.php'">Update Mess Details</button> <br><br>
    <button type="button" id="b7" name="update1" onclick="window.location.href='supdate.php'">Update Student Details</button> <br><br>
<a href="hp.html"><button type="button">LogOut</button></a> <br> <br><p id="leftb"></p>

   </form></div>
 </body></html>
