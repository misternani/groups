<?php

session_start();
include('connect.php');

$oldpass=$_POST['oldpassword'];
$newpass=$_POST['newpassword'];
$username=$_SESSION['logged_user'];
 
$sql = "SELECT * FROM student where username='".$username."' AND password='".$oldpass."' limit 1";

$result = $conn->query($sql);

if ($result->num_rows == 1) {

    $changepas="UPDATE student SET password='".$newpass."' WHERE username='".$username."' limit 1";
    $conn->query($changepas);
    echo "password changed successfully";
}
else{

    echo "entered password is wrong";
}

?>