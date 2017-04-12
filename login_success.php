<?php

include('header.php');
if (isset($_SESSION['userSession'])&&(($_SESSION['userSession']) == true)){

    echo'<h1>LOGGED IN AS '.$_SESSION['userSession'].'</h1>';
}

else {
    echo '<h1> you fucked up the sessions again</h1>';
}
?>