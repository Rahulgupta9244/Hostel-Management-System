<?php
$stid = $_POST['stid'];
$stname=$_POST['stname'];
$days=$_POST['days'];
$breakfast=$_POST['breakfast'];
$lunch=$_POST['lunch'];
$dinner = $_POST['dinner'];
$hid=$_POST['hid'];

$host = "localhost";
$dbUsername = "root";
$dbPassword = "";
$dbname = "hostel";

$conn = new mysqli($host,$dbUsername,$dbPassword,$dbname);

if (mysqli_connect_error()) {
    die('Connect Error('. mysqli_connect_errno().')'.mysqli_connect_error());
}
else {
    $SELECT = "SELECT staff_id from mess where staff_id = ? Limit 7";
    $INSERT = "INSERT into mess values(?,?,?,?,?,?,?)";
    
    $stmt = $conn->prepare($SELECT);
    $stmt->bind_param("s",$stid);
    $stmt->execute();
    $stmt->bind_result($stid);
    $stmt->store_result();
    $rnum = $stmt->num_rows;
    if($rnum==0) {
        $stmt->close();
        
         $stmt = $conn->prepare($INSERT);
    $stmt->bind_param("sssssss",$stid,$stname,$days,$breakfast,$lunch,$dinner,$hid);
    $stmt->execute();
        echo "new record inserted successfully";
    } else {
        echo "someone already registered";
    }
    $stmt->close();
    $conn->close();
}
?>