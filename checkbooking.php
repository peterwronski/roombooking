<?php
/**
 * Created by PhpStorm.
 * User: CG
 * Date: 19/04/2017
 * Time: 13:52
 */
session_start();
include('dbconnect.php');
$studentid = $_SESSION['studentid'];
$query = $conn->query("SELECT booking.student_id, booking.room_id, booking.bookdate, booking.booktime, booking.booking_status, room.room_name FROM booking, room WHERE booking.room_id = room.room_id AND student_id='$studentid'");
$row=$query->fetch_array();



function bookingStatus($row){
    switch ($row['booking_status']){
        case '0':
            echo'Awaiting Response';
            break;
        case '1':
            echo'<p><span class="glyphicon glyphicon-ok"></span>APPROVED</p> ';
            break;
        case '2':
            echo'<p><span class="glyphicon glyphicon-remove"></span>DENIED</p> ';

        default:
            echo 'Looks like something is wrong with your booking.';

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