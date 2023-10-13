<?php
session_start();



                         



     $_SESSION['supregsuccess']="    ";

     include('connect.php');

 $email= $_POST['email'];
$uname= $_POST['username'];
$passw=$_POST['password'];


if(empty($uname)||empty($email)||empty($passw))
{

}
else{
$sql="SELECT username FROM supervisor where username='".$uname."' limit 1";
$result = $conn->query($sql);


$nsql="SELECT email FROM supervisor where email='".$email."' limit 1";
    $nresult = $conn->query($nsql);
if ($result->num_rows == 1) {
        
       echo "Username already exists";
     ;
        exit();

    }

if ($nresult->num_rows == 1) {
        
        echo "email already exist";    
        exit();

    }

else {
    
    $_SESSION['logged_user']= $uname;
    $newsql="INSERT INTO supervisor (username,email,password)
    VALUES ('$uname','$email','$passw')";
    $newresult = $conn->query($newsql);

    
  echo "Registration Successful";
   

    exit();
}
   $conn->close();
  
}





?>
            