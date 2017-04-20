<?php
/**
 * Created by PhpStorm.
 * User: CG
 * Date: 19/04/2017
 * Time: 13:52
 */

session_start();
include('header.php');
include('dbconnect.php');


$query = $conn->query("SELECT booking.book_id, booking.student_id, booking.room_id, booking.bookdate, booking.booktime, booking.booking_status, booking.spec_req, room.room_name FROM booking, room WHERE booking.room_id = room.room_id");
//$row=$query->fetch_array();




echo '
<div class="container" id="checkbookingadmin">
<hr/>
    <div class="row">
        <div class="col-lg-8 col-lg-offset-2 contentbox">
<table class="rooms">
    <tr> <th  class="rooms">Booking ID</th>
        <th  class="rooms">Student ID</th>
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

        echo "<tr><td  class=\"rooms\">" . $row['book_id'] .
            "<td  class=\"rooms\">" . $row['student_id'] .
            "</td><td class=\"rooms\">" . $row['room_id'] .
            "</td><td class=\"rooms\">". $row['room_name'] .
            "</td><td class=\"rooms\">". $row['booktime'] .
            "</td><td class=\"rooms\">". $row['bookdate'] .
            "</td><td class=\"rooms\">". $row['spec_req'] .
            '</td><td class=\"rooms\"> <form method="POST"><select id="bookingstatusadmin"> <option value="0">Awaiting Approval</option>
                                                                   <option value="1">Approve</option>
                                                                   <option value="2">Deny</option></select></td></tr>';
        $bookid=$row['book_id'];
        $bookingstatusadmin=$_POST['bookingstatusadmin'];
        $updatestatus="UPDATE booking SET booking_status='$bookingstatusadmin' WHERE book_id='$bookid'";
        $conn->query($updatestatus);
    };
    echo'<tr><td colspan="8"><input type="submit">Submit</input></td></tr>
</form>
</table>';

} else {
    echo "<p>No bookings to show at the moment</p>";
}

$conn->close();