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
<table>
    <tr> <th style="width:15%">Room Name</th>
         <th style="width:15%">Room Size</th>
         <th style="width:70%">Room Description</th>
    </tr>';

if ($query->num_rows > 0) {
    // output data of each row
    while($row = $query->fetch_assoc()) {
        echo "<tr><td>" . $row['room_name'] . "</td><td>" . $row['room_size'] . "</td><td>". $row['room_desc'] . "</td></tr>";
    }
} else {
    echo "0 results";
}
echo '</table>';
$conn->close();

if (isset($_SESSION['userloggedin'])&&$_SESSION['userloggedin'] == 'sysAdmin'){
    echo'
    <form action="addroom.php" method="POST">
                   <label><b>Room ID</b></label>
                   <input type="text" name="roomid" placeholder="Room ID" id="roomname" required/>
<br/>            
                   <label><b>Room Name</b></label>
                   <input type="text" name="roomname" placeholder="Room Name" id="roomname" required/>
<br/>
                   <label><b>Room Size</b></label>
                   <input type="text" name="roomsize" id="roomsize" placeholder="Room size" required/>
<br/>
                   <label><b>Room Description</b></label>
                   <textarea name="roomdesc" id="roomdesc" placeholder="Enter a short description of the room, i.e. number of desks, computers, etc."></textarea>
                   
                   <input type="submit" name="addroom-submit"/>

               </form>
 
        </div>
    </div>
</div>';

}


?>