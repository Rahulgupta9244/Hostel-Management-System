<?php 
	$servername='localhost';
	$username='root';
	$password='';
	$dbname='hostel';

$con=mysqli_connect($servername,$username,$password,$dbname);
	$usernm=$_POST['username'];
	$passwd=$_POST['password'];


if(!empty($usernm) || !empty($passwd)){
	$sql="select* from hostel where h_id='".$usernm."' and w_password='".$passwd."'limit 1 ";
    $sql2="select* from admin where username='".$usernm."' and password='".$passwd."'limit 1 ";
    $result= mysqli_query($con,$sql);
	$row=mysqli_fetch_array($result);
   $result2= mysqli_query($con,$sql2);
	$row2=mysqli_fetch_array($result2);
    
	if(($row['h_id']==$usernm && $row['w_password']==$passwd) || ($row2['username']==$usernm && $row2['password']==$passwd)){
		header("Location:admin.html");
	
	}
	else{
		header("Location:login.php?error=1");
        }
}
else {
		header("Location:login.php?error=1");
}
?>
