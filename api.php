<?php
/**
 * Created by PhpStorm.
 * User: Peter
 * Date: 04/05/2017
 * Time: 00:08
 */

include('dbconnect.php');

function getRoomByID($id){

    $roomInfo = array();
    global $conn;
    $getRoomByID_query = $conn->query("SELECT room_id, room_name, room_size, room_desc FROM room WHERE room_id = '$id' ");



    $roomInfo = $getRoomByID_query->fetch_assoc();


//json_encode($roomInfo);
   return $roomInfo;
    /*switch ($id) {
        case 1:
            $roomInfo = array("room_id" => "RM01", "room_name" => "RoomName1", "room_size" => "5", "room_desc" => "ROOMDESCRIPTIONROOMDESCRIPTION");
            break;

        case 2:
            $roomInfo = array("room_id" => "RM02", "room_name" => "RoomName2", "room_size" => "5", "room_desc" => "ROOMDESCRIPTIONROOMDESCRIPTION");
            break;

    };*/
};

function getRoomList()
{
    global $conn;
    $roomList_query = $conn->query('SELECT room_id, room_name, room_size, room_desc FROM room');
    $roomList = array();
    while($row = $roomList_query->fetch_assoc()){
        array_push($roomList,$row);
    };

    json_encode($roomList);

   //var_dump($roomList);
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

        default:
            echo 'This function doesn\'t exist';
    }
}

//return JSON array
exit(json_encode($value));
?>