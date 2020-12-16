<?php
$hid = $_POST['hid'];
$hname=$_POST['hname'];
$nor=$_POST['nor'];
$hadd=$_POST['hadd'];
$wpswd=$_POST['wpswd'];

$host = "localhost";
$dbUsername = "root";
$dbPassword = "";
$dbname = "hostel";

$conn = new mysqli($host,$dbUsername,$dbPassword,$dbname);
if(empty($hid) || empty($hname) || empty($nor) || empty($hadd) || empty($wpswd)){
    echo '<font size="6" color="red"><center>';
       echo "ERROR...Some of the field is empty";
            echo "</center></font>";
    echo '<a href="hadd.html"><button type="button">BACK</button></a>';
}
 else {
if(mysqli_connect_error()) {
    die('Connect Error('. mysqli_connect_errno().')'. mysqli_connect_error());
}
else {
    $SELECT = "SELECT h_id from hostel where h_id = ? Limit 1";
    $INSERT = "INSERT into hostel values(?,?,?,?,?)";
    
    $stmt = $conn->prepare($SELECT);
    $stmt->bind_param("s",$hid);
    $stmt->execute();
    $stmt->bind_result($hid);
    $stmt->store_result();
    $rnum = $stmt->num_rows;
    if($rnum==0) {
        $stmt->close();
        
         $stmt = $conn->prepare($INSERT);
    $stmt->bind_param("ssiss",$hid,$hname,$nor,$hadd,$wpswd);
    $stmt->execute();
        echo '<center><font size="6" color="darkgreen">';
    echo "Hostel Details Inserted Successfully.";
    echo "<br>";
    echo "Going back in 2 seconds...";  
    echo "</font></center>";
     echo "<meta http-equiv='refresh' content='2;url=hadd.html'>";
    } else {
        echo "someone already registered using this hid";
    }
    $stmt->close();
    $conn->close();
}}
?>