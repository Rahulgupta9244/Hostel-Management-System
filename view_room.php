<!doctype html>
<html>
<head>
    <title>view_fees</title>
    <style type="text/css">
    table {
        border-collapse: collapse;
        width: 100%;
        color: #d96459;
        font-family: monospace;
        font-size: 25px;
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
        <th>Room ID</th>
        <th>Capacity</th>
        <th>Hostel Id</th>
     </tr>
<?php
    $conn = mysqli_connect("localhost","root","","hostel");
        if($conn-> connect_error) {
         die("Connection Failed:". $conn-> connect_error);
        }
        $sql = "SELECT  room_id,capacity,h_id from room";
        $result = $conn-> query($sql);
        if($result-> num_rows > 0) {
            while($row = $result-> fetch_assoc()) {
                echo "<tr><td>". $row["room_id"] ."</td><td>". $row["capacity"]. "</td><td>". $row["h_id"]. "</td></tr>";
            }
            echo "</table>";
        }
        else {
            echo "0 result";
        }
    $conn-> close();
?>
    </table><br><br>
    <input type="button" value="BACK" onclick="window.location.href='admin.html'">

    </body>
</html>