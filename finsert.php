<?php
$sid = $_POST['sid'];
$fm=$_POST['fm'];
$fa=$_POST['fa'];

$host = "localhost";
$dbUsername = "root";
$dbPassword = "";
$dbname = "hostel";

$conn = new mysqli($host,$dbUsername,$dbPassword,$dbname);
if(empty($sid) || empty($fm) || empty($fa)){
    echo '<font size="6" color="red"><center>';
       echo "ERROR...Some of the field is empty";
            echo "</center></font>";
    echo '<a href="fadd.html"><button type="button">BACK</button></a>';
}
 else {
if (mysqli_connect_error()) {
    die('Connect Error('. mysqli_connect_errno().')'.mysqli_connect_error());
}
else {
    $SELECT = "SELECT s_id from fees where s_id = ? Limit 12";
    $INSERT = "INSERT into fees values(?,?,?)";
    
    $stmt = $conn->prepare($SELECT);
    $stmt->bind_param("s",$sid);
    $stmt->execute();
    $stmt->bind_result($sid);
    $stmt->store_result();
    $rnum = $stmt->num_rows;
    if($rnum<13) {
        $stmt->close();
        
         $stmt = $conn->prepare($INSERT);
    $stmt->bind_param("ssi",$sid,$fm,$fa);
    $stmt->execute();
        echo '<center><font size="6" color="darkgreen">';
    echo "Fees Inserted Successfully.";
    echo "<br><br>";
    echo "Going back in 2 seconds...";  
    echo "</font></center>";
     echo "<meta http-equiv='refresh' content='2;url=fadd.html'>";
    } else {
        echo "Couldn't  Insert";
    }
    $stmt->close();
    $conn->close();
}
 }
?>