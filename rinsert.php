<?php
$rid = $_POST['rid'];
$capacity=$_POST['capacity'];
$hid=$_POST['hid'];

$host = "localhost";
$dbUsername = "root";
$dbPassword = "";
$dbname = "hostel";

$conn = new mysqli($host,$dbUsername,$dbPassword,$dbname);
if(empty($rid) || empty($capacity) || empty($hid)){
    echo '<font size="6" color="red"><center>';
       echo "ERROR...Some of the field is empty";
            echo "</center></font>";
    echo '<a href="radd.html"><button type="button">BACK</button></a>';
}
 else {
if(mysqli_connect_error()) {
    die('Connect Error('. mysqli_connect_errno().')'. mysqli_connect_error());
}
else {
    $SELECT = "SELECT room_id from room where room_id = ? Limit 1";
    $INSERT = "INSERT into room values(?,?,?)";
    
    $stmt = $conn->prepare($SELECT);
    $stmt->bind_param("s",$rid);
    $stmt->execute();
    $stmt->bind_result($rid);
    $stmt->store_result();
    $rnum = $stmt->num_rows;
    if($rnum==0) {
        $stmt->close();
        
         $stmt = $conn->prepare($INSERT);
    $stmt->bind_param("sis",$rid,$capacity,$hid);
    $stmt->execute();
        
echo '<center><font size="6" color="darkgreen">';
    echo "Room Inserted Successfully.";
    echo "<br>";
    echo "Going back in 2 seconds...";  
    echo "</font></center>";
     echo "<meta http-equiv='refresh' content='2;url=radd.html'>";

    } else {
        echo "Room already registered";
    }
    $stmt->close();
    $conn->close();
}}
?>