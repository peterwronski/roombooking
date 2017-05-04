
<html>
 <body>

<?php
if (isset($_GET["action"]) && isset($_GET["id"]) && $_GET["action"] == "getRoomByID")
{
    $roomInfo = file_get_contents('http://www.bookaroom.azurewebsites.net/api.php?action=getRoomByID&id=' . $_GET["id"]);
    $roomInfo = json_decode($roomInfo, true);
    ?>
    <table>
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
    <a href="http://www.bookaroom.azurewebsites.net/viewroom.php?action=getRoomList" alt="Room List">Return to the room list</a>



    <?php


}
else // else take the app list
{
    $roomList = file_get_contents('http://www.bookaroom.azurewebsites.net/api.php?action=getRoomList');
    $roomList = json_decode($roomList, true);
    ?>
    <ul>
        <?php foreach ($roomList as $room): ?>
            <li>
                <a href=<?php echo "http://www.bookaroom.azurewebsites.net/viewroom.php?action=getRoomByID&id=" . $room["room_id"]  ?> alt=<?php echo "room_" . $room_["room_id"] ?>><?php echo $room["room_name"] ?></a>
            </li>
        <?php endforeach; ?>
    </ul>
    <?php
} ?>
</body>
</html>