<?php
/**
 * Created by PhpStorm.
 * User: Peter
 * Date: 04/05/2017
 * Time: 00:08
 */
include('dbconnect.php');


function getRoomByID($id)
{
    $roomInfo = array();
    switch ($id){
        case 1:
            $roomInfo = array("room_id" => "RM01", "room_name" => "RoomName1", "room_size" => "5", "room_desc" => "ROOMDESCRIPTIONROOMDESCRIPTION");
            break;

        case 2:
            $roomInfo = array("room_id" => "RM02", "room_name" => "RoomName2", "room_size" => "5", "room_desc" => "ROOMDESCRIPTIONROOMDESCRIPTION");
            break;


            /*$roomByID_query='SELECT room_name, room_size, room_desc FROM room WHERE room_id=' .$id;

            while($row = mysqli_fetch_row($roomByID_query)){
                $roomInfo[] = $row;
            };*/

            return $roomInfo;
    }

}

function getRoomList()
{
    $roomList_query = 'SELECT room_id, room_name, room_size, room_desc FROM room';

    $roomList = mysqli_fetch_assoc($roomList_query);
    return $roomList;
}

$possible_url = array("getRoomByID", "getRoomList");

$value = "An error has occurred";

if (isset($_GET["action"]) && in_array($_GET["action"], $possible_url))
{
    switch ($_GET["action"])
    {
        case "getRoomList":
            $value = getRoomList();
            break;
        case "getRoomByID":
            if (isset($_GET["id"]))
                $value = getRoomByID($_GET["id"]);
            else
                $value = "Missing argument";
            break;
    }
}

//return JSON array
exit(json_encode($value));
?>