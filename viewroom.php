
<html>
 <body>

<?php
if (isset($_GET["action"]) && isset($_GET["id"]) && $_GET["action"] == "getRoomByID")
{
    $roomInfo = file_get_contents('http://bookaroom.azurewebsites.net/api.php?action=getRoomByID&id=' . $_GET["id"]);
    $roomInfo = json_decode($roomInfo, true);
    ?>
    <table>
        <tr>
            <td>Room ID: </td><td> <?php echo $roomInfo["room_id"] ?></td>
        </tr>

        <tr>
            <td>Room Name: </td><td> <?php echo $roomInfo["room_name"] ?></td>
        </tr>
        <tr>
            <td>Room Size </td><td> <?php echo $roomInfo["room_size"] ?></td>
        </tr>
        <tr>
            <td>Desc </td><td> <?php echo $roomInfo["room_desc"] ?></td>
        </tr>
    </table>
    <br />
    <a href="http://bookaroom.azurewebsites.net/viewroom.php?action=getRoomList" alt="Room List">Return to the room list</a>

    <?php
}
//if(isset($_GET["action"]) && isset($_GET["id"]) && $_GET["action"] == "getRoomList")
else {
    $roomList = file_get_contents('http://bookaroom.azurewebsites.net/api.php?action=getRoomList');
    $roomList_decoded = json_decode($roomList);

    echo '<ul>';

    foreach ($roomList_decoded as $room) {

        //var_dump($roomList_decoded);/*
         echo'<li>

                <a href=http://bookaroom.azurewebsites.net/viewroom.php?action=getRoomByID&id=' .$room["room_id"]  .'>' .$room["room_id"] .', ' .$room["room_name"] .'</a>
            </li> ';
        };
        echo'</ul>';

    };


?>
</body>
</html>