<?php
/**
 * Created by PhpStorm.
 * User: Peter
 * Date: 17/04/2017
 * Time: 00:36
 */
include ('header.php');
include('dbconnect.php');

$query = $conn->query("SELECT * FROM room");

$row=$query->fetch_array();

$count = $query->num_rows;

echo "<table>";

while($row = $count){
    echo "<tr><td>" . $row['room_name'] . "</td><td>" . $row['room_size'] . "</td><td>". $row['room_desc'] . "</td></tr>";  //$row['index'] the index here is a field name
}

echo "</table>";

$conn->close();