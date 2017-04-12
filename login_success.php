<?php

if (isset($_SESSION['userSession'])&&(($_SESSION['userSession']) == true)){
    include('header.php');
    echo'<h1>LOGGED IN AS '.$_SESSION['userSession'].'</h1>';
}
?>