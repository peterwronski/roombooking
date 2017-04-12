<?php

include('header.php');
if (isset($_SESSION['userloggedin'])&&(($_SESSION['userloggedin']) == true)){

    echo'<h1>LOGGED IN AS '.$_SESSION['userloggedin'].'</h1>';
}

else {
    echo '<h1> you fucked up the sessions again '.$_SESSION['userloggedin'] .'</h1>';
}
?>