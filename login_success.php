<?php

include('header.php');
if (isset($_SESSION['userloggedin'])&&(($_SESSION['userloggedin']) == true)){
echo $_SESSION['studentid'];
    //header("Location:index.php");
}

else {
    echo '<h1> Sessions are messed up again '.$_SESSION['userloggedin'] .'</h1>';
}
?>