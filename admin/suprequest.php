<?php
session_start();
     include('connect.php');
$supervisor=$_POST['supervisor'];
$topic=$_POST['topic'];


if(isset($_POST['approve']))
{
	
	$sql="SELECT topicname FROM topiclist where topicname='".$topic."' limit 1";
$result = $conn->query($sql);



if ($result->num_rows == 1) {
   


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

      echo "Request Approved";


    }



else {
    
   
    $newsql="INSERT INTO topiclist (topicname, supervisorname)
    VALUES ('$topic','$supervisor')";
    $newresult = $conn->query($newsql);
     $assignn="UPDATE supervisor SET topicname='".$topic."' WHERE username='".$supervisor."' limit 1";
    $conn->query($assignn);
    
   echo "Request Approved";

    exit();
}




$sql="DELETE FROM supervisorrequest WHERE supervisorname='".$supervisor."' ";
$conn->query($sql);
   $conn->close();
  
}



if(isset($_POST['deny']))
{
	$sql="DELETE FROM supervisorrequest WHERE supervisorname='".$supervisor."' ";
$conn->query($sql);
	echo "Request Denied";

}

?>f