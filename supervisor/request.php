
<?php
session_start();
include('connect.php');



$uname= $_SESSION['logged'];
$topic=$_POST['topic'];

$sql="SELECT supervisorname FROM supervisorrequest where supervisorname='".$uname."' limit 1";
$result = $conn->query($sql);
if($result->num_rows == 1)
{
  $sql="UPDATE supervisorrequest SET  topicname='".$topic."' WHERE supervisorname='".$uname."'  ";
  $result = $conn->query($sql);
   echo "request updated";
}
else{

 $newsql="INSERT INTO supervisorrequest (supervisorname,topicname)
    VALUES ('$uname','$topic')";
    $newresult = $conn->query($newsql);

    echo "request sent";

}



$conn->close();
?>