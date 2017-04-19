<?php
include ('header.php');
include('dbconnect.php');
echo'<div class="container" id="#addroom">

        <div class="row">
        <div class="col-lg-8 col-lg-offset-2 contentbox">';

if (isset($_SESSION['userloggedin'])&&$_SESSION['userloggedin'] == 'sysAdmin'){
    echo'
    <form action="addroomscr.php" method="POST">
                   <label><b>Room ID</b></label>
                   <input type="text" name="roomid" placeholder="Room ID e.g. RM11" id="roomname" maxlength="4" required/>
<br/>            
                   <label><b>Room Name</b></label>
                   <input type="text" name="roomname" placeholder="Room Name" id="roomname" required/>
<br/>
                   <label><b>Room Size</b></label>
                   <input type="text" name="roomsize" id="roomsize" placeholder="Room size" required/>
<br/>
                   <label><b>Room Description</b></label>
                   <textarea name="roomdesc" id="roomdesc" placeholder="Enter a short description of the room, i.e. number of desks, computers, etc."></textarea>
                   
                   <input type="submit" name="addroom-submit"/>

               </form>
 
        </div>
    </div>
</div>    ';
}

else{
    echo'<h1> You ain\'t supposed to be here';
}


?>