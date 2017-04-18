<?php
/**
 * Created by PhpStorm.
 * User: Peter
 * Date: 18/04/2017
 * Time: 15:01
 */

include ('dbconnect.php');

$roomid = $_POST["roomid"];
$bookingdate = date_format($_POST["roomsize"], 'Y/m/d');
$bookingtime = $_POST["roomdesc"];



$roomid = $conn->real_escape_string($roomid);
$bookingdate = $conn->real_escape_string($bookingdate);
$bookingtime = $conn->real_escape_string($bookingtime);

echo $bookingdate;
