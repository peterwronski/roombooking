<?php


if (isset($_SESSION['userloggedin'])&&(($_SESSION['userloggedin']) == true)) {
    include('dbconnect.php');

    $query = $conn->query("SELECT room_name, room_id FROM room");
echo '
<div class="container" id="booking">
<hr/>
    <div class="row"><h1>Book a room</h1>
        <div class="col-lg-8 col-lg-offset-2 contentbox">
<table class="loginform"></table>
        <form method="POST">
        <tr><td> <label>Room name</label></td> <td><select>
           
                ';
    while($row = $query->fetch_assoc()) {


                    echo'<option value='.$row["room_id"].'>' .$row["room_name"] .'</option>';
    };
     echo'</select></td></tr>

        <tr><td class="loginform"><label>Booking date</label></td><td class="loginform"><input type="date" required></input></td></tr>
             
        <tr><td class="loginform"><label>Booking time</label></td><td class="loginform"><input type="time" required></input></td></tr>     
                
        
            
                
        </form>
        </table>
        ';
}
else{
    echo'<div class="alert alert-warning">
  <strong>You need to be logged in to book a room</strong> Please <a href="#loginpage">click here to log in</a> or <a href="register.php">here to register</a>
        </div>
     </div>
    </div>
</div>';
}

//$row=$query->fetch_array();
