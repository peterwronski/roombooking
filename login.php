<?php

require_once('dbconnect.php');


    $studentid = trim($_POST["studentid"]);
    $password = trim($_POST['password']);


    echo "Login echo: " .$studentid .$password;




// To protect MySQL injection (more detail about MySQL injection)
$studentid = stripslashes($studentid);
$password = stripslashes($password);
$studentid = $conn->real_escape_string($studentid);
$password = $conn->real_escape_string($password);
//$sql="SELECT * FROM $tbl_name WHERE student_id='$studentid' and pword='$password'";
$query = $conn->query("SELECT student_id, pword FROM users WHERE student_id='$studentid'");
$row=$query->fetch_array();

// Mysql_num_row is counting table row
$count = $query->num_rows;

// If result matched $myusername and $mypassword, table row must be 1 row
if (password_verify($password, $row['password']) && $count==1) {
    $_SESSION['userSession'] = $row['studentid'];
    header("Location: login_success.php");
} else {

    $_SESSION['loginmessage'] = "<div class='alert alert-danger'>
     <span class='glyphicon glyphicon-info-sign'></span> &nbsp; Invalid Username or Password !
    ";

} 
$conn->close();
?>