<?php

session_start();
$_SESSION['changepasmessage']="   ";
include('connect.php');

$oldpass=$_POST['oldpassword'];
$newpass=$_POST['newpassword'];
$username=$_SESSION['user'];
 
$sql = "SELECT * FROM admin where username='".$username."' AND password='".$oldpass."' limit 1";

$result = $conn->query($sql);

if ($result->num_rows == 1) {

    $changepas="UPDATE admin SET password='".$newpass."' WHERE username='".$username."' limit 1";
    $conn->query($changepas);
    echo "password changed successfully";
    
}
else{

    echo "entered password is wrong";
   
}

?>