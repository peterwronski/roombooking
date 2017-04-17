<?php
include('dbconnect.php');
//if (isset($_SESSION['userloggedin'])&&$_SESSION['userloggedin'] == 'sysAdmin'){
    $roomname = $_POST["roomname"];
    $roomsize = $_POST["roomnsize"];
    $roomdesc = $_POST["roomdesc"];

    $roomname = $conn->real_escape_string($roomname);
    $roomsize = $conn->real_escape_string($roomsize);
    $roomdesc = $conn->real_escape_string($roomdesc);

    $query = $conn->query("INSERT INTO room VALUES ('$roomname ','$roomsize','$roomdesc')");
    header("Location:index.php#rooms");
};
/*else{
    ?>
<script type="text/javascript">
    alert("You ain't supposed to be here son.");

    window.location = "index.php"
</script>
<?php }*/
?>