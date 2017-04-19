<?php
/**
 * Created by PhpStorm.
 * User: Peter
 * Date: 17/04/2017
 * Time: 00:36
 */


include('dbconnect.php');

$query = $conn->query("SELECT room_name, room_size, room_desc FROM room");
//$row=$query->fetch_array();
$count = mysql_num_rows($query);

echo '
<div class="container" id="rooms">
<hr/>
    <div class="row"><h1>Our Rooms @ RGU</h1>
        <div class="col-lg-8 col-lg-offset-2 contentbox">
<table class="rooms">
    <tr> <th  class="rooms">Room Name</th>
         <th  class="rooms">Room Size</th>
         <th  class="rooms">Room Description</th>
    </tr>';

if ($query->num_rows > 0) {
    // output data of each row
    while($row = $query->fetch_assoc()) {
        echo "<tr><td  class=\"rooms\">" . $row['room_name'] . "</td><td class=\"rooms\">" . $row['room_size'] . "</td><td class=\"rooms\">". $row['room_desc'] . "</td></tr>";
    }
} else {
    echo "0 results";
}
echo '</table>
</div>
</div>
</div>
';

$conn->close();
?>