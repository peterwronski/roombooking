<?php
/**
 * Created by PhpStorm.
 * User: CG
 * Date: 19/04/2017
 * Time: 13:52
 */

session_start();
include('header.php');
echo' <div class="container" id="checkbookingadmin">
<hr/>
    <div class="row">
        <div class="col-lg-8 col-lg-offset-2 contentbox">';

if (isset($_SESSION['userloggedin'])&&$_SESSION['userloggedin'] == 'sysAdmin') {
    include('dbconnect.php');

    $query = $conn->query("SELECT booking.book_id, booking.student_id, booking.room_id, booking.bookdate, booking.booktime, booking.booking_status, booking.spec_req, room.room_name FROM booking, room WHERE booking.room_id = room.room_id");
//$row=$query->fetch_array();


    echo '

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
        while ($row = $query->fetch_assoc()) {

            echo "<tr><td  class=\"rooms\">" . $row['book_id'] .
                "</td><td  class=\"rooms\">" . $row['student_id'] .
                "</td><td class=\"rooms\">" . $row['room_id'] .
                "</td><td class=\"rooms\">" . $row['room_name'] .
                "</td><td class=\"rooms\">" . $row['booktime'] .
                "</td><td class=\"rooms\">" . $row['bookdate'] .
                "</td><td class=\"rooms\">" . $row['spec_req'] .
                '</td><td class=\"rooms\"> <form method="POST"><input type="radio" name="bookingstatus" value="1"> Approve <br/>
                                                           <input type="radio" name="bookingstatus" value="2"> Deny  </td></tr>';

        };
        $bookid = $row['book_id'];
        $bookingstatus = $_POST['bookingstatus'];
        $updatestatus = "UPDATE booking SET booking_status='$bookingstatus' WHERE book_id='$bookid'";
        $conn->query($updatestatus);
        if ($conn->query($updatestatus) === TRUE) {
            echo '<h1>The thing worked</h1>';
        } else {
            echo '<h1>I fucked up</h1>';
        }
        echo '<tr><td colspan="8"><input type="submit"></input></td></tr>
</form>
</table>';

    } else {
        echo "<p>No bookings to show at the moment</p>";
    }

}
else {
    echo'<h1> You ain\'t supposed to be here</h1>';

}

$conn->close();