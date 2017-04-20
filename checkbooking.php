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
$query = $conn->query("SELECT booking.student_id, booking.room_id, booking.bookdate, booking.booktime, booking.booking_status, booking.spec_req, room.room_name FROM booking, room WHERE booking.room_id = room.room_id AND student_id='$studentid'");
$row=$query->fetch_assoc();












echo '
<div class="container" id="checkbooking">
<hr/>
    <div class="row"><h1>Check your booking @ RGU</h1>
        <div class="col-lg-8 col-lg-offset-2 contentbox">
<table class="rooms">
    <tr> <th  class="rooms">Student ID</th>
         <th  class="rooms">Room ID</th>
         <th  class="rooms">Room Name</th>
         <th  class="rooms">Booking Time</th>
         <th  class="rooms">Booking Date</th>
         <th  class="rooms">Special requirements</th>
         <th  class="rooms">Booking status</th>
        
    </tr>';

$bookingStatus = $row['booking_status'];
function assignStatus($bookingStatus)
{
    switch ($bookingStatus) {
        case '0':
            $_SESSION['bookingstatus'] = "Awaiting Response";
            break;
        case '1':
            $_SESSION['bookingstatus'] = '<p><span class="glyphicon glyphicon-ok"></span>APPROVED</p> ';
            break;
        case '2':
            $_SESSION['bookingstatus'] = '<p><span class="glyphicon glyphicon-remove"></span>DENIED</p> ';
            break;
        default:
            $_SESSION['bookingstatus'] = 'Looks like something is wrong with your booking.';
            break;
    };
}
if ($query->num_rows > 0) {
    // output data of each row



$i=0;
     while($query->num_rows>$i){
         assignStatus($row);
        echo "<tr><td  class=\"rooms\">" . $row['student_id'] .
             "</td><td class=\"rooms\">" . $row['room_id'] .
             "</td><td class=\"rooms\">". $row['room_name'] .
            "</td><td class=\"rooms\">". $row['booktime'] .
            "</td><td class=\"rooms\">". $row['bookdate'] .
            "</td><td class=\"rooms\">". $row['spec_req'] .
            "</td><td class=\"rooms\">" .$_SESSION['bookingstatus'] .'</td></tr>';

        $i++; };

} else {
    echo "No bookings to show at the moment";
}
echo '</table>';
$conn->close();

?>