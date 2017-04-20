<?php
/**
 * Created by PhpStorm.
 * User: CG
 * Date: 20/04/2017
 * Time: 08:47
 */

/*if (($_POST['password']!=$_POST['password2'])) {// this checks to see if both password fields are a match
    echo'<script type="text/javascript">
        alert("Your passwords aren\'t matching. Please make sure your passwords match before submitting the form.");

    window.location = "index.php#loginpage"
        </script>';
}

if ($_POST['studentid']=='admin'){// this makes sure that users don't register as admin
    echo'<script type="text/javascript">
        alert("Your student ID isn\'t \'admin\'. Nice try though.");

    window.location = "index.php#loginpage"
        </script>';
}

if ($_POST['name']=='sysAdmin' || $_POST['name']=='sysadmin' ){// this makes sure that users don't register as admin
    echo'<script type="text/javascript">
        alert("Your name isn\'t \'sysAdmin\'. Nice try though.");

    window.location = "index.php#loginpage"
        </script>';
}*/

$studentid = strip_tags($_POST['studentid']);
$name = strip_tags($_POST['name']);
$password = strip_tags($_POST['password']);

$studentid = $conn->real_escape_string($studentid);
$name = $conn->real_escape_string($name);
$password = $conn->real_escape_string($password);

$hashAndSalt = password_hash($password, PASSWORD_BCRYPT);
echo $hashAndSalt;
/*$check_studentid = $conn->query("SELECT student_id FROM user WHERE student_id='$studentid'");
$count=$check_studentid->num_rows;

if($count==0){
    $adduser="INSERT INTO user(student_id, name, pword) VALUES('$student_id','$name','$hashAndSalt')";
    if($conn->query($adduser) === TRUE){
        echo'USER REGISTERED';
    }
    else{
        echo'there\'s been an error';
    }
}
else{
    echo'STUDENT ID ALREADY REGISTERED';
}*/

?>