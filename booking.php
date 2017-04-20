<?php
session_start();
echo'<div class="container" id="booking">
<hr/>
<div class="row"><h1>Book a room</h1>
        <div class="col-lg-8 col-lg-offset-2 contentbox">';

if (isset($_SESSION['userloggedin'])&&(($_SESSION['userloggedin']) == true)) {
    include('dbconnect.php');

    $query = $conn->query("SELECT room_name, room_id FROM room");
echo '<table class="logintable">
        <form method="POST" action="addbooking.php">
        <tr><td align="right" class="logintable"> <label>Room name</label></td> <td align="left" ><select name="roomid">
           ';
    while($row = $query->fetch_array()) {
                    echo'<option value='.$row["room_id"].'>' .$row["room_name"] .'</option>';
    };
     echo'</select></td></tr>

        <tr><td align="right" class="logintable"><label>Booking date</label></td><td align="left" class=" logintable"><input type="date" name="bookingdate" value="<?php echo date(\'Y-m-d\'); ?>" required/></td></tr>
             
        <tr><td align="right" class="logintable"><label>Booking time</label></td><td align="left" class=" logintable"><input type="time" name="bookingtime" value="<?php echo time(\'H-i\'); ?>" required/></td></tr>     
       
        <tr><td align="right" class="logintable"><label>Special Requirements</label></td><td align="left" class=" logintable"><textarea name="specreq" rows="10" cols="20" placeholder="Let us know if you have any special requirements, e.g. special equipment or accessibility"></textarea></td></tr>     
    
                
        <tr><td class="logintable" colspan="2" align="center"><input type="submit"/></td></tr>
            
                
        </form>
        </table>
        </div>
         
         
    </div>
</div>

        ';
     $conn->close();
     include ('checkbooking.php');

}
else{
    echo'<div class="alert alert-warning">
  <strong>You need to be logged in to book a room or check bookings</strong> 
  </div>
     ';

    include('loginpage.php');
}

//$row=$query->fetch_array();
