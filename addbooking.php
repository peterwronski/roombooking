<?php
/**
 * Created by PhpStorm.
 * User: Peter
 * Date: 18/04/2017
 * Time: 15:01
 */
//start_session();
include ('dbconnect.php');



$bookingdate = date('Y-m-d', strtotime($_POST['bookingdate']));
$bookingtime = date('H:i', strtotime($_POST['bookingtime']));
$roomid = $_POST['roomid'];


$roomid = $conn->real_escape_string($roomid);
$bookingdate = $conn->real_escape_string($bookingdate);
$bookingtime = $conn->real_escape_string($bookingtime);


echo $bookingdate .'<br/>' .$bookingtime .'<br/>' .$roomid .'<br/>' .$_SESSION['studentid'];

$query_selectall = "SELECT * FROM booking WHERE room_id= '$roomid' AND bookdate = '$bookingdate' AND booktime='$bookingtime'";
$sql=$conn->query($query_selectall);

$count = $sql->num_rows;

/*if($count==0){
    $query_insertbooking="INSERT INTO booking VALUES ('$studentid','$roomid','$bookingdate','$bookingtime','0' ";

    if ($conn->query($query_insertbooking) === TRUE) {
        echo 'Booking Added!';
    }
    else{
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

else {
    echo $count .' - Room already booked';
};*/
?>

