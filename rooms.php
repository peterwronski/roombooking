<?php
/**
 * Created by PhpStorm.
 * User: Peter
 * Date: 17/04/2017
 * Time: 00:36
 */
include ('header.php');
include('dbconnect.php');

$query = $conn->query("SELECT room_name, room_size, room_desc FROM room");
$row=$query->fetch_array();
$count = mysql_num_rows($query);


echo "<table>";

while($row <= $count){
    echo "<tr><td>" . $row['room_name'] . "</td><td>" . $row['room_size'] . "</td><td>". $row['room_desc'] . "</td></tr>";
}
echo "</table>";
$conn->close();
?>