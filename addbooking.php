<?php
if (isset($_SESSION['userloggedin'])&&(($_SESSION['userloggedin']) == true)) {
    include('dbconnect.php');

    $query = $conn->query("SELECT room_name, room_id FROM room");
echo '<form method="POST" ';
    while($row = $query->fetch_assoc()) {


      echo'<option value='.$row["room_id"].'>' .$row["room_name"] .'</option>';
    }

}

//$row=$query->fetch_array();
