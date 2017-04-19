<?php
/**
 * Created by PhpStorm.
 * User: Peter
 * Date: 18/04/2017
 * Time: 15:01
 */

session_start();


include ('dbconnect.php');



$bookingdate = date('Y-m-d', strtotime($_POST['bookingdate']));
$bookingtime = date('H:i', strtotime($_POST['bookingtime']));
$roomid = $_POST['roomid'];
$studentid = $_SESSION['studentid'];
$specreq = $_POST['specreq'];

$roomid = $conn->real_escape_string($roomid);
$bookingdate = $conn->real_escape_string($bookingdate);
$bookingtime = $conn->real_escape_string($bookingtime);
$studentid = $conn->real_escape_string($studentid);
$specreq = $conn->real_escape_string($specreq);


$query_selectall = "SELECT * FROM booking WHERE room_id= '$roomid' AND bookdate = '$bookingdate' AND booktime='$bookingtime'";
$sql=$conn->query($query_selectall);
$count = $sql->num_rows;


if($count==0){
    if(empty($specreq)){
        $query_insertbooking = "INSERT INTO booking (student_id, room_id, bookdate, booktime, booking_status) VALUES ('$studentid','$roomid','$bookingdate','$bookingtime','0')";
    }
    else{
        $query_insertbooking = "INSERT INTO booking (student_id, room_id, bookdate, booktime, booking_status, spec_req) VALUES ('$studentid','$roomid','$bookingdate','$bookingtime','0','$specreq')";
    }
    if ($conn->query($query_insertbooking) === TRUE) {
        $_SESSION['bookingaddedmsg'] = '<div class="alert alert-success">
  <strong>Success!</strong> Booking added!
</div>';
        header("Location: index.php");
    }
    else{
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

else {
    $_SESSION['bookingtakenmsg'] = '<div class="alert alert-danger">
  <strong>Booking unavailable!</strong> Try picking another time or room</div>';
    header("Location: index.php");
};

$conn->close();
?>

