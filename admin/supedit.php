<?php
session_start();



                         



     

     include('connect.php');

 $email= $_POST['email'];
$uname= $_POST['username'];
$passw=$_POST['password'];
$topic=$_POST['topic'];



if(empty($uname)||empty($email)||empty($passw))
{

}
else{






     $newsql="UPDATE supervisor SET topicname=' '
     WHERE topicname='".$topic."' limit 1";
   
    $newresult = $conn->query($newsql);

    
    $newsql="UPDATE supervisor SET password='".$passw."',email='".$email."',topicname='".$topic."'
     WHERE username='".$uname."' limit 1";
   
    $newresult = $conn->query($newsql);


      $newsql="UPDATE topiclist SET supervisorname=' '
     WHERE supervisorname='".$uname."' limit 1";
   
    $newresult = $conn->query($newsql);

     
   
    $newresult = $conn->query($newsql);


      $newsql="UPDATE topiclist SET supervisorname='".$uname."'
     WHERE topicname='".$topic."' limit 1";
   
    $newresult = $conn->query($newsql);

    
       
       header("location: supervisoredit.php");
       echo "updated";

    exit();
  $conn->close();
  
}





?>
            