<?php
include ('header.php');
include('dbconnect.php');

if (isset($_SESSION['userloggedin'])&&$_SESSION['userloggedin'] == 'sysAdmin'){
    echo'
    <form action="addroom.php" method="POST">
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
};

if (isset($_SESSION['userloggedin'])&&$_SESSION['userloggedin'] == 'sysAdmin') {
    $roomid = $_POST["roomid"];
    $roomname = $_POST["roomname"];
    $roomsize = $_POST["roomsize"];
    $roomdesc = $_POST["roomdesc"];

    $roomid = $conn->real_escape_string($roomid);
    $roomname = $conn->real_escape_string($roomname);
    $roomsize = $conn->real_escape_string($roomsize);
    $roomdesc = $conn->real_escape_string($roomdesc);

    $query = "INSERT INTO room (room_id, room_size, room_desc, room_name) VALUES ('$roomid','$roomsize','$roomdesc','$roomname')";


    if ($conn->query($query) === TRUE) {
        header("Location:index.php#rooms");
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

};
$conn->close();
?>