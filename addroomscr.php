<?php
/**
 * Created by PhpStorm.
 * User: CG
 * Date: 20/04/2017
 * Time: 02:57
 */
session_start();
include('dbconnect.php');

    $roomid = $_POST["roomid"];
    $roomname = $_POST["roomname"];
    $roomsize = $_POST["roomsize"];
    $roomdesc = $_POST["roomdesc"];

    $roomid = $conn->real_escape_string($roomid);
    $roomname = $conn->real_escape_string($roomname);
    $roomsize = $conn->real_escape_string($roomsize);
    $roomdesc = $conn->real_escape_string($roomdesc);

    $query = "INSERT INTO room (room_id, room_size, room_desc, room_name) VALUES ('$roomid','$roomsize','$roomdesc','$roomname')";

//$sql=$conn->query($query_selectall);


    if ($conn->query($query) === TRUE) {
        echo '<script type="text/javascript">
    alert("Room created.");
    window.location = "addroom.php"
              </script>';
    }
    else{
       //$conn->error;

   echo '<script type="text/javascript">
    alert('.$conn->error .'); 
    window.location = "addroom.php" ';
};

$conn->close();

