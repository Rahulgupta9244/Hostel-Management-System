<?php
$vid = $_POST['vid'];
$vname=$_POST['vname'];
$sid=$_POST['sid'];
$tin=$_POST['tin'];
$tout=$_POST['tout'];
$din = $_POST['din'];
$relation=$_POST['relation'];

$host = "localhost";
$dbUsername = "root";
$dbPassword = "";
$dbname = "hostel";

$conn = new mysqli($host,$dbUsername,$dbPassword,$dbname);
if(empty($vid) || empty($vname) || empty($sid) || empty($tin) || empty($tout) || empty($din) || empty($relation)){
    echo '<font size="6" color="red"><center>';
       echo "ERROR...Some of the field is empty";
            echo "</center></font>";
    echo '<a href="vadd.html"><button type="button">BACK</button></a>';
}
 else {
if (mysqli_connect_error()) {
    die('Connect Error('. mysqli_connect_errno().')'.mysqli_connect_error());
}
else {
    $SELECT = "SELECT visitor_id from visitor where visitor_id = ? Limit 1";
    $INSERT = "INSERT into visitor values(?,?,?,?,?,?,?)";
    
    $stmt = $conn->prepare($SELECT);
    $stmt->bind_param("s",$vid);
    $stmt->execute();
    $stmt->bind_result($vid);
    $stmt->store_result();
    $rnum = $stmt->num_rows;
    if($rnum==0) {
        $stmt->close();
        
         $stmt = $conn->prepare($INSERT);
    $stmt->bind_param("sssssss",$vid,$vname,$sid,$tin,$tout,$din,$relation);
    $stmt->execute();
        
echo '<center><font size="6" color="darkgreen">';
    echo "Visitor Inserted Successfully.";
    echo "<br><br>";
    echo "Going back in 2 seconds...";  
    echo "</font></center>";
     echo "<meta http-equiv='refresh' content='2;url=vadd.html'>";
    } else {
        echo "someone already registered";
    }
    $stmt->close();
    $conn->close();
}}
?>