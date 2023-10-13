<?php
session_start();



                         



     $_SESSION['topicmessage']="   ";

     include('connect.php');

 $topic= $_POST['topic'];


if(empty($topic))
{

}
else{
$sql="SELECT topicname FROM topiclist where topicname='".$topic."' limit 1";
$result = $conn->query($sql);


if ($result->num_rows == 1) {
          
    echo "Topic Already Exists";
   
        
    
        exit();

    }


else {
    
    
    $newsql="INSERT INTO topiclist (topicname)
    VALUES ('$topic')";
    $newresult = $conn->query($newsql);

    
   echo "Topic Added";
     

    exit();
}
   $conn->close();
  
}





?>
            