<!doctype html>
<html>
<head>
    <title>view_mesh</title>
    <style type="text/css">
    table {
        border-collapse: collapse;
        width: 100%;
        color: #d96459;
        font-family: monospace;
        font-size: 15px;
        text-align: left;
        }
        th {
            background-color: #588c7e;
            color: white;
        }
        tr:nth-child(even) {background-color: #f2f2f2}
        
    </style>
    </head>
<body>
    <table border="1">
    <tr>
        <th>Visitor ID</th>
        <th>Visitor Name</th>
        <th>Student ID</th>
        <th>Entry Time </th>
        <th>Exit Time</th>
        <th>Entry Date</th>
        <th>Relation</th>
     </tr>
<?php
    $conn = mysqli_connect("localhost","root","","hostel");
        if($conn-> connect_error) {
         die("Connection Failed:". $conn-> connect_error);
        }
        $sql = "SELECT  visitor_id,visitor_name,s_id,time_in,time_out,date_in,relation from visitor";
        $result = $conn-> query($sql);
        if($result-> num_rows > 0) {
            while($row = $result-> fetch_assoc()) {
                echo "<tr><td>" . $row["visitor_id"] . "</td><td>" . $row["visitor_name"] . "</td><td>" . $row["s_id"] . "</td><td>" . $row["time_in"] . "</td><td>" . $row["time_out"] . "</td><td>" . $row["date_in"] . "</td><td>" . $row["relation"] . "</td></tr>";
            }
            echo "</table>";
        }
        else {
            echo "0 result";
        }
    $conn-> close();
?>
    </table>
        <br><br><input type="button" value="BACK" onclick="window.location.href='admin.html'">

    </body>
</html>