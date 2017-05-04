
<html>
 <body>

<?php
if (isset($_GET["action"]) && isset($_GET["id"]) && $_GET["action"] == "getRoomByID")
{
    $roomInfo = file_get_contents('http://www.bookaroom.azurewebites.net/api.php?action=getRoomByID&id=' . $_GET["id"]);
    $roomInfo = json_decode($roomInfo, true);
    ?>
    <table>
        <tr>
            <td>App Name: </td><td> <?php echo $app_info["app_name"] ?></td>
        </tr>
        <tr>
            <td>Price: </td><td> <?php echo $app_info["app_price"] ?></td>
        </tr>
        <tr>
            <td>Version: </td><td> <?php echo $app_info["app_version"] ?></td>
        </tr>
    </table>
    <br />
    <a href="http://www.bookaroom.azurewebites.net/REST_Client.php?action=getRoomLit" alt="Room List">Return to the room list</a>
    <?php
}
else // else take the app list
{
    $roomList = file_get_contents('http://www.bookaroom.azurewebites.net/api.php?action=getRoomList');
    $roomList = json_decode($roomList, true);
    ?>
    <ul>
        <?php foreach ($roomList as $room): ?>
            <li>
                <a href=<?php echo "http://www.bookaroom.azurewebsites.net/REST_Client.php?action=getRoomByID&id=" . $room["id"]  ?> alt=<?php echo "room_" . $room_["room_id"] ?>><?php echo $room["room_name"] ?></a>
            </li>
        <?php endforeach; ?>
    </ul>
    <?php
} ?>
</body>
</html>