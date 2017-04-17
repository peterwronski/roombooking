<?php

include('header.php');
if (isset($_SESSION['userloggedin'])&&(($_SESSION['userloggedin']) == true)){

    header("Location:index.php");
}

else {
    echo '<h1> you fucked up the sessions again '.$_SESSION['userloggedin'] .'</h1>';
}
?>