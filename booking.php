<?php
echo'<div class="container" id="booking">
<div class="row"><h1>Book a room</h1>
        <div class="col-lg-8 col-lg-offset-2 contentbox">';

if (isset($_SESSION['userloggedin'])&&(($_SESSION['userloggedin']) == true)) {
    include('dbconnect.php');

    $query = $conn->query("SELECT room_name, room_id FROM room");
echo '<table class="logintable">
        <form method="POST" action="addbooking.php">
        <tr><td align="right" class="logintable"> <label>Room name</label></td> <td align="left" ><select id="roomname">
           ';
    while($row = $query->fetch_assoc()) {
                    echo'<option value='.$row["room_id"].'>' .$row["room_name"] .'</option>';
    };
     echo'</select></td></tr>

        <tr><td align="right" class=" logintable"><label>Booking date</label></td><td align="left" class=" logintable"><input type="date" id="bookingdate" required/></td></tr>
             
        <tr><td align="right" class=" logintable"><label>Booking time</label></td><td align="left" class=" logintable"><input type="time" id="bookingtime" required/></td></tr>     
                
        <tr><td class="logintable" colspan="2" align="center"><input type="submit"/></td></tr>
            
                
        </form>
        </table>
        </div>
    </div>
</div>
        ';
}
else{
    echo'<div class="alert alert-warning">
  <strong>You need to be logged in to book a room</strong> Please <a href="#loginpage">click here to log in</a> or <a href="register.php">here to register</a>
        </div>
     ';
}

//$row=$query->fetch_array();