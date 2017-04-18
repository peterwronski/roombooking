<?php
/**
 * Created by PhpStorm.
 * User: Peter
 * Date: 18/04/2017
 * Time: 15:01
 */

include ('dbconnect.php');

$date_string = $_POST["bookingdate"];
$time_string = $_POST["bookingtime"];

$roomid = $_POST["roomid"];
$bookingdate = date('y-m-d', $date_string);
//$bookingdate = date_format($bookingdate, 'Y-m-d');

//$bookingtime = date_create($_POST["bookingtime"]);
$bookingtime = date('H:i', $time_string);
$user_id = $_SESSION['studentid'];

echo $bookingtime .'<br/>' .$bookingdate;
$roomid = $conn->real_escape_string($roomid);
$bookingdate = $conn->real_escape_string($bookingdate);
$bookingtime = $conn->real_escape_string($bookingtime);
$studentid = $conn->real_escape_string($studentid);



$query_selectall = "SELECT * FROM booking WHERE room_id= '$roomid' AND bookdate = '$bookingdate'";
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

