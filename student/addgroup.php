<?php
session_start();



                         





     include('connect.php');

 $group= $_POST['group'];
 $topic=$_POST['topic'];


if(empty($group))
{

}
else{
$sql="SELECT groupname FROM grouplist where groupname='".$group."' limit 1";
$result = $conn->query($sql);


if ($result->num_rows == 1) {
          
         echo "Group Already Exists";
        
    
        exit();

    }


else {
    
   $uname=  $_SESSION['logged_user'];
    $newsql="INSERT INTO grouplist (groupname,member1,topicname,creatorname)
    VALUES ('$group','$uname','$topic','$uname')";
    $newresult = $conn->query($newsql);

    
       $change="UPDATE student SET groupname='".$group."' WHERE username='".$uname."' limit 1";

         $sql="UPDATE student SET  groupname='".$group."' WHERE username='".$uname."'  ";
  $result = $conn->query($sql);
 
       echo "Group Added";
    $conn->query($change);
    exit();
}
   $conn->close();
  
}





?>
            