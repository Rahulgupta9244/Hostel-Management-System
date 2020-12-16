<?php
include_once(db.php);
if(isset($_GET['del']))
{
    $id = $_GET['del'];
    $sql = "DELETE FROM fees where s_id='$id'";
    $res = mysql_query($sql) or die("Failed".mysql_error());
    echo "<meta http-equiv='refresh' content='0;url=index.php'>";
}
