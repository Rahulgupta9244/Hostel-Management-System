<?php
include_once('db.php');
?>
<?php
if(isset($_POST['submit']))
{
    $s_id = $_POST['name'];
      if(empty($s_id)){
    echo '<font size="6" color="red"><center>';
       echo "ERROR...Some of the field is empty";
            echo "</center></font>";
    echo '<a href="vdelete.php"><button type="button">BACK</button></a>';
}
 else {
    $sql = "DELETE FROM visitor WHERE visitor_id='$s_id'";
    $res = mysqli_query($conn,$sql) or die("Failed".mysqli_error());
    
    echo '<center><font size="6" color="darkgreen">';
    echo "Visitor Deleted Successfully.";
    echo "<br><br>";
    echo "Going back in 2 seconds...";  
    echo "</font></center>";
    echo "<meta http-equiv='refresh' content='2;url=vdelete.php'>";
}}
?>