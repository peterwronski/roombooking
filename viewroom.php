
<html>
 <body>

<?php
    if (isset($_GET["action"]) && isset($_GET["id"])) {
        switch ($_GET["action"]) {
            case "getRoomByID":

                $roomInfo = file_get_contents('http://bookaroom.azurewebsites.net/api.php?action=getRoomByID&id=' . $_GET["id"]);
                $roomInfo = json_decode($roomInfo, true);
                ?>
                <table>
                    <tr>
                        <td>Room ID:</td>
                        <td> <?php echo $roomInfo["room_id"] ?></td>
                    </tr>
                    <tr>
                        <td>Room Name:</td>
                        <td> <?php echo $roomInfo["room_name"] ?></td>
                    </tr>
                    <tr>
                        <td>Room Size</td>
                        <td> <?php echo $roomInfo["room_size"] ?></td>
                    </tr>
                    <tr>
                        <td>Desc</td>
                        <td> <?php echo $roomInfo["room_desc"] ?></td>
                    </tr>
                </table>
                <br/>
                <a href="http://bookaroom.azurewebsites.net/viewroom.php?action=getRoomList" alt="Room List">Return to
                    the room list</a>
                <?php

                break;




            case "getRoomList":

                $roomList = file_get_contents('http://bookaroom.azurewebsites.net/api.php?action=getRoomList');
                $roomList = json_decode($roomList, true);

                echo '<ul>';

                foreach ($roomList as $room) {
                    echo ' <li>   <a href=http://bookaroom.azurewebsites.net/viewroom.php?action=getRoomByID&id=' . $room["room_id"] . '>' . $room["room_id"] . ', ' . $room["room_name"] . '</a>
            </li> ';
                };
                echo '</ul>';

                break;

            default:

                echo 'This function name doesn\'t exist';
                break;
        }

}

?>
</body>
</html>