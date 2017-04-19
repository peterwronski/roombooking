<?php
/**
 * Created by PhpStorm.
 * User: CG
 * Date: 19/04/2017
 * Time: 13:52
 */

include('dbconnect.php');

$query = $conn->query("SELECT student_id, room_id, bookdate, booktime, bookingstatus, room_name FROM booking, room WHERE room_id.booking = room_id.room");
$row=$query->fetch_array();

function bookingStatus($row){
    switch ($row['booking_status']){
        case '1':
            echo'Awaiting Response';
            break;
        case '2':
            echo'<p><span class="glyphicon glyphicon-ok"></span>APPROVED</p> ';
            break;
        case '3':
            echo'<p><span class="glyphicon glyphicon-remove"></span>DENIED</p> ';

    }
}

echo '
<div class="container" id="checkbooking">
<hr/>
    <div class="row"><h1>Check you booking @ RGU</h1>
        <div class="col-lg-8 col-lg-offset-2 contentbox">
<table class="rooms">
    <tr> <th  class="rooms">Student ID</th>
         <th  class="rooms">Room ID</th>
         <th  class="rooms">Room Name</th>
         <th  class="rooms">Booking Time</th>
         <th  class="rooms">Booking Date</th>
         <th  class="rooms">Booking status</th>
        
    </tr>';

if ($query->num_rows > 0) {
    // output data of each row
    while($row=$query->fetch_array()) {
        echo "<tr><td  class=\"rooms\">" . $row['student_id'] .
             "</td><td class=\"rooms\">" . $row['room_id'] .
             "</td><td class=\"rooms\">". $row['room_name'] .
            "</td><td class=\"rooms\">". $row['booktime'] .
            "</td><td class=\"rooms\">". $row['bookdate'] .
            "</td><td class=\"rooms\">" .bookingStatus($row) .'</td></tr>';
    }
} else {
    echo "0 results";
}
echo '</table>';
$conn->close();