<?php
include_once('db.php');
?>
<?php
if(isset($_POST['submit']))
{
    $s_id = $_POST['name1'];
    $s_field = $_POST['name2'];
    $s_value = $_POST['name3'];
    if(empty($s_id) || empty($s_field) || empty($s_value)){
    echo '<font size="6" color="red"><center>';
       echo "ERROR...Some of the field is empty";
            echo "</center></font>";
    echo '<a href="supdate.php"><button type="button">BACK</button></a>';
}
 else {
    $sql = "UPDATE student SET $s_field='$s_value' WHERE s_id='$s_id'";
    $res = mysqli_query($conn,$sql);
    
echo '<center><font size="6" color="darkgreen">'; 
    echo "Student Details Updated Successfully";
    echo "<br><br>";
    echo "Going back in 2 seconds....";
    echo "</font></center>";
    echo "<meta http-equiv='refresh' content='2;url=supdate.php'>";
}}
?>

