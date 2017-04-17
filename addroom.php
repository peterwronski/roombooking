<?php
if (isset($_SESSION['userloggedin'])&&$_SESSION['userloggedin'] == 'sysAdmin'){
    $roomname = $_POST["roomname"];
    $roomsize = $_POST["roomnsize"];
    $roomdesc = $_POST["roomdesc"];
}
    $query = $conn->query("INSERT INTO room VALUES ('$roomname ',' $roomsize','$roomdesc')");
};
?>