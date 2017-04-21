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
        echo'<script type="text/javascript">

    alert("Booking created. You can check the status of your booking now.");

    window.location = "index.php"
</script>';
        header("Location: index.php");
    }
    else{
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

else {
    echo'<script type="text/javascript">
    alert("Booking unavailable! Try another room or date ");

    window.location = "index.php#booking"
</script>';
    header("Location: index.php");
};

$conn->close();
?>

