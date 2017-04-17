<?php
include('dbconnect.php');
//if (isset($_SESSION['userloggedin'])&&$_SESSION['userloggedin'] == 'sysAdmin'){
    $roomname = $_POST["roomname"];
    $roomsize = $_POST["roomnsize"];
    $roomdesc = $_POST["roomdesc"];

    $roomname = $conn->real_escape_string($roomname);
    $roomsize = $conn->real_escape_string($roomsize);
    $roomdesc = $conn->real_escape_string($roomdesc);

    $query = "INSERT INTO room VALUES ('$roomsize ','$roomdesc','$roomname')";




if ($conn->query($query) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
?>