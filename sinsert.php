<?php
$sid = $_POST['name1'];
$sname = $_POST['name2'];
$department = $_POST['name3'];
$dob = $_POST['name4'];
$address = $_POST['name5'];
$phone = $_POST['name6'];
$fname = $_POST['name7'];
$fphone = $_POST['name8'];
$roomid = $_POST['name9'];
$hid = $_POST['name10'];



$host = "localhost";
$dbUsername = "root";
$dbPassword = "";
$dbname = "hostel";

$conn = new mysqli($host,$dbUsername,$dbPassword,$dbname);
if(empty($hid) || empty($sname) || empty($sid) || empty($department) || empty($dob) || empty($address) || empty($phone) || empty($fname) || empty($fphone) || empty($roomid)){
    echo '<font size="6" color="red"><center><marquee>';
       echo "ERROR...Some of the field is empty";
            echo "</marquee></center></font>";
    echo '<a href="sadd.html"><button type="button">BACK</button></a>';
}
 else {
if(mysqli_connect_error()) {
    die('Connect Error('. mysqli_connect_errno().')'. mysqli_connect_error());
}
else {
    $SELECT = "SELECT s_id from student where s_id = ? Limit 1";
    $INSERT = "INSERT into student values(?,?,?,?,?,?,?,?,?,?)";
    
    $stmt = $conn->prepare($SELECT);
    $stmt->bind_param("s",$sid);
    $stmt->execute();
    $stmt->bind_result($sid);
    $stmt->store_result();
    $rnum = $stmt->num_rows;
    if($rnum==0) {
        $stmt->close();
        
         $stmt = $conn->prepare($INSERT);
    $stmt->bind_param("ssssssssss",$sid,$sname,$department,$dob,$address,$phone,$fname,$fphone,$roomid,$hid);
    $stmt->execute();
        
echo '<center><font size="6" color="darkgreen">';
    echo "Student Inserted Successfully.";
    echo "<br>";
    echo "Going back in 2 seconds...";  
    echo "</font></center>";
            echo "<meta http-equiv='refresh' content='2;url=sadd.html'>";

    
    } else {
        echo "Student Record Not Inserted";
    }
    $stmt->close();
    $conn->close();
}}
?>