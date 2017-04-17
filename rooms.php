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
//$row=$query->fetch_array();
$count = mysql_num_rows($query);


/* ///TABLE///
echo "<table>";

while($row <= $count){
    echo "<tr><td>" . $row['room_name'] . "</td><td>" . $row['room_size'] . "</td><td>". $row['room_desc'] . "</td></tr>";
}
echo "</table>";
*/

echo '
<div class="container" id="rooms">
    <div class="row"><h1>Our Rooms @ RGU</h1>
        <div class="col-lg-8 col-lg-offset-2 contentbox">
<table>
    <tr> <th>Room Name</th>
         <th>Room Size</th>
         <th>Room Description</th>
    </tr>';

if ($query->num_rows > 0) {
    // output data of each row
    while($row = $query->fetch_assoc()) {
        echo "<tr><td>" . $row['room_name'] . "</td><td>" . $row['room_size'] . "</td><td>". $row['room_desc'] . "</td></tr>";
    }
} else {
    echo "0 results";
}
echo '</table>
        </div>
    </div>
</div>';

$conn->close();
?>