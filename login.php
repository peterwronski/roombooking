<?php
/**
 * Created by PhpStorm.
 * User: Peter
 * Date: 14/04/2017
 * Time: 03:57
 */

session_unset();
session_start();


include('dbconnect.php');
//echo'required dbconnect file';

    $studentid = trim($_POST["studentid"]);
    $password = trim($_POST['password']);

//echo "Login echo: " .$studentid .$password;
//echo '<br/> Host:' .$connectstr_dbhost .'<br/>Dbase: ' .$connectstr_dbname .'<br/>Name: ' .$connectstr_dbusername;




// To protect MySQL injection (more detail about MySQL injection)
$studentid = stripslashes($studentid);
$password = stripslashes($password);
$studentid = $conn->real_escape_string($studentid);
$password = $conn->real_escape_string($password);



$query = $conn->query("SELECT student_id, pword, name FROM users WHERE student_id='$studentid'");

$row=$query->fetch_array();

$count = $query->num_rows; // if email/password are correct returns must be 1 row


if (password_verify($password, $row['pword']) && $count==1) {
    $_SESSION['userloggedin'] = $row['name'];
    $_SESSION['studentid'] = $row['student_id'];
    header("Location: index.php#booking");
}
else {
    header("Location: login_failed.php");
}
$conn->close();
?>