<?php
session_start();
include('connect.php');



$uname= $_POST['username'];
$passw=$_POST['password'];



$sql = "SELECT * FROM student where username='".$uname."' AND password='".$passw."' limit 1";

$result = $conn->query($sql);

if ($result->num_rows == 1) {
    $_SESSION['logged_user']=$uname;
   header("location: dashboard.php");
    exit();
} else {
    header("location: logerror.html");
    exit();
}

$conn->close();
?>