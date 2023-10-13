<?php
session_start();
include('connect.php');


$email= $_POST['email'];
$uname= $_POST['username'];
$passw=$_POST['password'];




$sql="SELECT username FROM supervisor where username='".$uname."' limit 1";
$result = $conn->query($sql);


$nsql="SELECT email FROM supervisor where email='".$email."' limit 1";
    $nresult = $conn->query($nsql);

if ($result->num_rows == 1) {
    
    header("location: unameexists.html");    
    exit();
} 
if ($nresult->num_rows == 1) {
        
        header("location: emailexists.html");    
        exit();

    }

else {
    
    $_SESSION['logged_user']= $uname;
    $newsql="INSERT INTO supervisor (email, password, username)
    VALUES ('$email','$passw','$uname')";
    $newresult = $conn->query($newsql);

    
    header("location: regsuccess.html");

    exit();
}

$conn->close();
?>