<?php
session_start();
include('connect.php');



$uname= $_SESSION['logged_user'];
$group=$_POST['group'];

$sql="SELECT studentname FROM joinrequests where studentname='".$uname."' limit 1";
$result = $conn->query($sql);
if($result->num_rows == 1)
{
  $sql="UPDATE joinrequests SET  groupname='".$group."' WHERE studentname='".$uname."'  ";
  $result = $conn->query($sql);
  echo "request updated";
  
}
else{

    $newsql="INSERT INTO joinrequests (studentname,groupname)
    VALUES ('$uname','$group')";
    $newresult = $conn->query($newsql);
   echo "request sent";
   

}



$conn->close();
?>