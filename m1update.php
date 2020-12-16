<?php
include_once('db.php');
?>
<?php
if(isset($_POST['submit']))
{
    $staff_id = $_POST['name1'];
    $s_field = $_POST['name2'];
    $s_value = $_POST['name3'];
    if(empty($staff_id) || empty($s_field) || empty($s_value)){
    echo '<font size="6" color="red"><center>';
       echo "ERROR...Some of the field is empty";
            echo "</center></font>";
    echo '<a href="mupdate.php"><button type="button">BACK</button></a>';
}
 else {
    $sql = "UPDATE mess SET $s_field='$s_value' WHERE staff_id='$staff_id'";
    $res = mysqli_query($conn,$sql);
    echo '<center><font size="6" color="darkgreen">';
    echo "Mess Details Updated Successfully.";
    echo "<br>";
    echo "Going back in 2 seconds...";  
    echo "</font></center>";
    echo "<meta http-equiv='refresh' content='2;url=mupdate.php'>";
}}
?>