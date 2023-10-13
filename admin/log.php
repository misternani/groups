<?php
session_start();

$_SESSION['loginmessage']="   ";
include('connect.php');



$uname= $_POST['username'];
$passw=$_POST['password'];



$sql = "SELECT * FROM admin where username='".$uname."' AND password='".$passw."' limit 1";

$result = $conn->query($sql);

if ($result->num_rows == 1) {
    $_SESSION['user']=$uname;
   header("location: studentlist.php");
    exit();
} else {

    header("location: loginfailed.html");
    exit();
}

$conn->close();
?>