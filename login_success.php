<?php

include('header.php');
if (isset($_SESSION['userloggedin'])&&(($_SESSION['userloggedin']) == true)){
//echo $_SESSION['studentid'] --WORKS;
    header("Location:index#booking.php");
}

else {
    echo '<h1> Sessions are messed up again '.$_SESSION['userloggedin'] .'</h1>';
}
?>