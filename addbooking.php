<?php
/**
 * Created by PhpStorm.
 * User: Peter
 * Date: 18/04/2017
 * Time: 15:01
 */

include ('dbconnect.php');

$roomid = $_POST["roomid"];
$date = date_create($_POST["bookingdate"]);
$bookingdate = date_format($date, 'Y/m/d');
$bookingtime = $_POST["roomdesc"];
$studentid = $_SESSION['studentid'];


$roomid = $conn->real_escape_string($roomid);
$bookingdate = $conn->real_escape_string($bookingdate);
$bookingtime = $conn->real_escape_string($bookingtime);
$studentid = $conn->real_escape_string($student_id);

$query_selectall = "SELECT * FROM booking WHERE room_id= '$roomid' AND bookdate = '$bookingdate'";

$count = $query_selectall->num_rows;

if(count>0){
    $sql=$conn->query("INSERT INTO booking VALUES ('$studentid','$roomid','$bookingdate','$bookingtime','0' " );
    if ($conn->query($query) === TRUE) {
        echo 'Booking Added!';
    }
    else{
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

