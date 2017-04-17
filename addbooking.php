<?php
session_start();
if (isset($_SESSION['userloggedin'])&&(($_SESSION['userloggedin']) == true)) {
    include('dbconnect.php');

    $query = $conn->query("SELECT room_name, room_id FROM room");
echo '
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

//$row=$query->fetch_array();
