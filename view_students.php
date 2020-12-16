<!doctype html>
<html>
<head>
    <title>view_student</title>
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
        <th>Student ID</th>
        <th>Student Name</th>
        <th>Department</th>
        <th>Birth Date</th>
        <th>Address</th>
        <th>Phone</th>
        <th>Father's Name</th>
        <th>Father's Phone</th>
        <th>Room ID</th>
        <th>Hostel ID</th>
     </tr>
<?php
    $conn = mysqli_connect("localhost","root","","hostel");
        if($conn-> connect_error) {
         die("Connection Failed:". $conn-> connect_error);
        }
        $sql = "SELECT  s_id,s_name,department,dob,address,phone,f_name,f_phone,room_id,h_id from student";
        $result = $conn-> query($sql);
        if($result-> num_rows > 0) {
            while($row = $result-> fetch_assoc()) {
                echo "<tr><td>" . $row["s_id"] . 
                    "</td><td>" . $row["s_name"] . 
                    "</td><td>" . $row["department"] . 
                    "</td><td>" . $row["dob"] . 
                    "</td><td>" . $row["address"] . 
                    "</td><td>" . $row["phone"] . 
                    "</td><td>" . $row["f_name"] .
                    "</td><td>" . $row["f_phone"] . 
                    "</td><td>" . $row["room_id"] . 
                    "</td><td>" . $row["h_id"] .
                    "</td></tr>";
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