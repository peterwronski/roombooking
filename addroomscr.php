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

    $checkid_query = "SELECT * FROM room WHERE room_id = '$roomid'";
    $sql=$conn->query($checkid_query);
    $count = $sql->num_rows;

    $query = "INSERT INTO room (room_id, room_size, room_desc, room_name) VALUES ('$roomid','$roomsize','$roomdesc','$roomname')";

//$sql=$conn->query($query_selectall);

if($count == 0){
    $conn->query($query);
    echo '<script type="text/javascript">
    alert("Room created.");
    window.location = "addroom.php"
              </script>';
    }
    else{
    echo $count;
   echo '<script type="text/javascript">
    alert("Room ID already taken. Try a different one."); 
    window.location = "addroom.php" ';
};

$conn->close();

