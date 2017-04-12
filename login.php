<?php
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



$query = $conn->query("SELECT student_id, password, name FROM users WHERE student_id='$studentid' AND password= '$password'");

$row=$query->fetch_array();

$count = $query->num_rows; // if email/password are correct returns must be 1 row







// If result matched $myusername and $mypassword, table row must be 1 row
if ($count==1) {
    $_SESSION['userSession'] = $row['name'];
    echo 'SESSION ECHO: ' .$_SESSION['userSession'];
    echo 'ROW ECHO: ' .$row['name'];
    //header("Location: login_success.php");
};

?>