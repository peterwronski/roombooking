<?php

session_start();
session_unset();

include('dbconnect.php');
echo'required dbconnect file';

    $studentid = trim($_POST["studentid"]);
    $password = trim($_POST['password']);


echo "Login echo: " .$studentid .$password;

echo '<br/> Host:' .$connectstr_dbhost .'<br/>Dbase: ' .$connectstr_dbname .'<br/>Name: ' .$connectstr_dbusername;




// To protect MySQL injection (more detail about MySQL injection)
$studentid = stripslashes($studentid);
$password = stripslashes($password);
$studentid = $conn->real_escape_string($studentid);
$password = $conn->real_escape_string($password);
//$sql="SELECT * FROM $tbl_name WHERE student_id='$studentid' and pword='$password'";
$query = $conn->query("SELECT studentid, password FROM users WHERE studentid='$studentid'");




$result=mysqli_query($db,$query);

if( mysqli_num_rows($result) == 1)
 {
     header("location: login_success.php"); // Redirecting To another Page
 }else
 {
     header("location: login_failed.php");
 }



/*
// If result matched $myusername and $mypassword, table row must be 1 row
if (password_verify($password, $row['password']) && $count==1) {
    $_SESSION['userSession'] = $row['studentid'];
    header("Location: login_success.php");
} else {

    $_SESSION['loginmessage'] = "<div class='alert alert-danger'>
     <span class='glyphicon glyphicon-info-sign'></span> &nbsp; Invalid Username or Password !
    ";

}*/
$conn->close();
?>