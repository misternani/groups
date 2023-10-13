<?php
session_start();



                         



     

     include('connect.php');

 $email= $_POST['email'];
$uname= $_POST['username'];
$passw=$_POST['password'];
$topic=$_POST['topicname'];
$group=$_POST['groupname'];


if(empty($uname)||empty($email)||empty($passw))
{

}
else{






    
    
    $newsql="UPDATE student SET password='".$passw."',email='".$email."',topicname='".$topic."',groupname='".$group."'
     WHERE username='".$uname."' limit 1";
   
    $newresult = $conn->query($newsql);

    
       
       header("location: studentedit.php");
       echo "updated";

    exit();
  $conn->close();
  
}





?>
            