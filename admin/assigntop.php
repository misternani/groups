<?php
session_start();


  
                         



     $_SESSION['assignmessage']="    ";

     include('connect.php');

 $supervisor= $_POST['supervisor'];
$topic= $_POST['topic'];



if(empty($supervisor)||empty($topic))
{

}
else{
$sql="SELECT topicname FROM topiclist where topicname='".$topic."' limit 1";
$result = $conn->query($sql);



if ($result->num_rows == 1) {
    /* $assignn="UPDATE topiclist SET supervisorname=' '
     WHERE supervisorname='".$uname."' limit 1";

     $conn->query($assignn);
    $assignn="UPDATE topiclist SET supervisorname='".$supervisor."' WHERE topicname='".$topic."' limit 1";
    $conn->query($assignn);

         $assignn="UPDATE supervisor SET topicname=' ' WHERE topicname='".$topic."' limit 1";
    $conn->query($assignn);

     
      $assignn="UPDATE supervisor SET topicname='".$topic."' WHERE username='".$supervisor."' limit 1";
    $conn->query($assignn);*/


     $newsql="UPDATE supervisor SET topicname=' '
     WHERE topicname='".$topic."' limit 1";
   
    $newresult = $conn->query($newsql);

    


      $newsql="UPDATE topiclist SET supervisorname=' '
     WHERE supervisorname='".$supervisor."' limit 1";
   
    $newresult = $conn->query($newsql);

     
   
    $newresult = $conn->query($newsql);


      $newsql="UPDATE topiclist SET supervisorname='".$supervisor."'
     WHERE topicname='".$topic."' limit 1";
   
    $newresult = $conn->query($newsql);


      $newsql="UPDATE supervisor SET topicname='".$topic."'
     WHERE username='".$supervisor."' limit 1";
   
    $newresult = $conn->query($newsql);

      echo "Topic Assigned";
    


    }



else {
    
   
    $newsql="INSERT INTO topiclist (topicname, supervisorname)
    VALUES ('$topic','$supervisor')";
    $newresult = $conn->query($newsql);
     $assignn="UPDATE supervisor SET topicname='".$topic."' WHERE username='".$supervisor."' limit 1";
    $conn->query($assignn);
    
   echo "Topic Assigned";
       

    exit();
}
   $conn->close();
  
}





?>
            