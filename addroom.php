<?php
include ('header.php');

echo'<div class="container" id="#addroom">

        <div class="row">
        <div class="col-lg-8 col-lg-offset-2 contentbox">';

if (isset($_SESSION['userloggedin'])&&$_SESSION['userloggedin'] == 'sysAdmin'){
    echo'
    <form action="addroomscr.php" method="POST">
                   <label><b>Room ID</b></label>
                   <input type="text" name="roomid" placeholder="Room ID e.g. RM11" maxlength="4" required/>
<br/>            
                   <label><b>Room Name</b></label>
                   <input type="text" name="roomname" placeholder="Room Name" required/>
<br/>
                   <label><b>Room Size</b></label>
                   <input type="text" name="roomsize" placeholder="Room size" required/>
<br/>
                   <label><b>Room Description</b></label>
                   <textarea name="roomdesc"  placeholder="Enter a short description of the room, i.e. number of desks, computers, etc."></textarea>
                   
                   <input type="submit"/>

               </form>
 
        </div>
    </div>
</div>    ';
}

else{
    echo'<h1> You ain\'t supposed to be here';
}


?>