<?php
session_start();
include('connect.php');


$email= $_POST['email'];
$uname= $_POST['username'];
$passw=$_POST['password'];




$sql="SELECT username FROM student where username='".$uname."' limit 1";
$result = $conn->query($sql);


$nsql="SELECT email FROM student where email='".$email."' limit 1";
    $nresult = $conn->query($nsql);

if ($result->num_rows == 1) {
    
    header("location: une.html");    
    exit();
} 
if ($nresult->num_rows == 1) {
        
        header("location: ee.html");    
        exit();

    }

else {
    
    $_SESSION['logged_user']= $uname;
    $newsql="INSERT INTO student (username, email, password)
    VALUES ('$uname','$email','$passw')";
    $newresult = $conn->query($newsql);

    header("location: regsuccess.html");

    exit();
}

$conn->close();
?>