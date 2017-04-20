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
//$row=$query->fetch_array();




echo '
<div class="container" id="checkbookingadmin">
<hr/>
    <div class="row">
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

if ($query->num_rows > 0) {
    // output data of each row
    while($row=$query->fetch_assoc()) {

        switch ($row){
            case '0':
                $_SESSION['bookingstatus']='Awaiting Response';
                break;
            case '1':
                $_SESSION['bookingstatus']='<p><span class="glyphicon glyphicon-ok"></span>APPROVED</p> ';
                break;
            case '2':
                $_SESSION['bookingstatus']='<p><span class="glyphicon glyphicon-remove"></span>DENIED</p> ';
                break;
            default:
                $_SESSION['bookingstatus']= 'Looks like something is wrong with your booking.';
                break;

        };

        echo "<tr><td  class=\"rooms\">" . $row['student_id'] .
            "</td><td class=\"rooms\">" . $row['room_id'] .
            "</td><td class=\"rooms\">". $row['room_name'] .
            "</td><td class=\"rooms\">". $row['booktime'] .
            "</td><td class=\"rooms\">". $row['bookdate'] .
            "</td><td class=\"rooms\">". $row['spec_req'] .
            '</td><td class=\"rooms\"> <form method="POST"><select id="bookingstatusadmin"> <option value="0">Awaiting Approval</option>
                                                                   <option value="1">Approve</option>
                                                                   <option value="2">Deny</option></select></form></td></tr>';
        $studentidadmin=$row['student_id'];
        $bookingstatusadmin=$_POST['bookingstatusadmin'];
        $updatestatus="UPDATE booking SET booking_status='$bookingstatusadmin' WHERE student_id='$studentid'";
        $conn->query($updatestatus);
    };

} else {
    echo "No bookings to show at the moment";
}
echo '</table>';
$conn->close();