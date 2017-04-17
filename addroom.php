<?php
include('dbconnect.php');
//if (isset($_SESSION['userloggedin'])&&$_SESSION['userloggedin'] == 'sysAdmin'){
    $roomid = $_POST["roomid"];
    $roomname = $_POST["roomname"];
    $roomsize = $_POST["roomsize"];
    $roomdesc = $_POST["roomdesc"];

    $roomid = $conn->real_escape_string($roomid);
    $roomname = $conn->real_escape_string($roomname);
    $roomsize = $conn->real_escape_string($roomsize);
    $roomdesc = $conn->real_escape_string($roomdesc);

    $query = "INSERT INTO room (room_id, room_size, room_desc, room_name) VALUES ('$roomid','$roomsize','$roomdesc','$roomname')";




if ($conn->query($query) === TRUE) {
    header("Location:index.php#rooms");
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
?>