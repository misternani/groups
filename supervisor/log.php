<?php
session_start();
include('connect.php');



$uname= $_POST['username'];
$passw=$_POST['password'];



$sql = "SELECT * FROM supervisor where username='".$uname."' AND password='".$passw."' limit 1";

$result = $conn->query($sql);

if ($result->num_rows == 1) {
    $_SESSION['logged']=$uname;
   header("location: topic.php");
    exit();
} else {
    header("location: loginfail.html");
    exit();
}

$conn->close();
?>