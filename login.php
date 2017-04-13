<?php
session_unset();
session_start();


include('dbconnect.php');
//echo'required dbconnect file';

    $studentid = trim($_POST["studentid"]);
    $password = trim($_POST['password']);

//echo "Login echo: " .$studentid .$password;
//echo '<br/> Host:' .$connectstr_dbhost .'<br/>Dbase: ' .$connectstr_dbname .'<br/>Name: ' .$connectstr_dbusername;


    if ((empty($_POST['studentid']))||($_POST['studentid']!="")) {// this checks if email field is empty
        $_SESSION['loginmessage'] = "<div class='alert alert-danger'>
        <span class='glyphicon glyphicon-info-sign'></span>Student ID field cannot be empty </div>";
        header('Location: index.php');
    }
    if ((empty($_POST['password']))||($_POST['password']!="")) {//this checks if password field is empty
        $_SESSION['passwordmessage'] = "<div class='alert alert-danger'>
     <span class='glyphicon glyphicon-info-sign'></span> Password field cannot be empty </div>";
        header('Location:index.php');
    }

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
    $_SESSION['userloggedin'] = $row['name'];


    header("Location: login_success.php");
};

?>